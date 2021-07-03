<?php

namespace App\Http\Livewire;

use App\Models\BloodType;
use App\Models\Guardian;
use App\Models\GuardianAttachment;
use App\Models\Nationality;
use App\Models\Religion;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;


class AddGuardian extends Component
{
    use WithFileUploads;

    public $descriptions, $stock, $status = 1;
    public $photos, $catchError, $show_table = true, $updateMode = false, $guardian_id;
    public $currentStep = 1;
    public $successMessage = '';
    public $email, $password;
    public $f_name_ar, $f_name_en, $f_job_ar, $f_job_en, $f_nid, $f_pid, $f_nationalityId, $f_bloodtypeId, $f_religionId, $f_address, $f_phone;
    public $m_name_ar, $m_name_en, $m_job_ar, $m_job_en, $m_nid, $m_pid, $m_nationalityId, $m_bloodtypeId, $m_religionId, $m_address, $m_phone;


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'email' => 'required|email',
            'f_nid' => 'required|string|min:10|max:10|regex:/[0-9]{9}/',
            'f_pid' => 'min:10|max:10',
            'f_phone' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'm_nid' => 'required|string|min:10|max:10|regex:/[0-9]{9}/',
            'm_pid' => 'min:10|max:10',
            'm_phone' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        ]);
    }


    public function render()
    {
        return view('livewire.add-guardian', [
            'nationalities' => Nationality::all(),
            'blood_types' => BloodType::all(),
            'religions' => Religion::all(),
            'guardians' => Guardian::all(),
        ]);
    }

    public function firstStepSubmit()
    {
        $this->validate([
            'email' => 'required|unique:guardians,email,' . $this->id,
            'password' => 'required',
            'f_name_en' => 'required',
            'f_name_ar' => 'required',
            'f_job_en' => 'required',
            'f_job_ar' => 'required',
            'f_nid' => 'required|unique:guardians,f_nid,' . $this->id,
            'f_pid' => 'required|unique:guardians,f_pid,' . $this->id,
            'f_phone' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'f_nationalityId' => 'required',
            'f_bloodtypeId' => 'required',
            'f_religionId' => 'required',
            'f_address' => 'required',
        ]);

        $this->currentStep = 2;
    }

    public function firstStepSubmitUpdate()
    {
        $this->vupdateMode = true;
        $this->currentStep = 2;
    }

    public function secondStepSubmit()
    {
        $this->validate([
            'm_name_en' => 'required',
            'm_name_ar' => 'required',
            'm_job_en' => 'required',
            'm_job_ar' => 'required',
            'm_nid' => 'required|unique:guardians,m_nid,' . $this->id,
            'm_pid' => 'required|unique:guardians,m_pid,' . $this->id,
            'm_phone' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'm_nationalityId' => 'required',
            'm_bloodtypeId' => 'required',
            'm_religionId' => 'required',
            'm_address' => 'required',
        ]);

        $this->currentStep = 3;
    }

    public function secondStepSubmitUpdate()
    {
        $this->updateMode = true;
        $this->currentStep = 3;
    }

    public function back($step)
    {
        $this->currentStep = $step;
    }

    public function submitForm()
    {
        try {
            $guardian = new Guardian();
            // Father_INPUTS
            $guardian->email = $this->email;
            $guardian->password = Hash::make($this->password);
            $guardian->f_name = ['en' => $this->f_name_en, 'ar' => $this->f_name_ar];
            $guardian->f_nid = $this->f_nid;
            $guardian->f_pid = $this->f_pid;
            $guardian->f_phone = $this->f_phone;
            $guardian->f_job = ['en' => $this->f_job_en, 'ar' => $this->f_job_ar];
            $guardian->f_nationalityId = $this->f_nationalityId;
            $guardian->f_bloodtypeId = $this->f_bloodtypeId;
            $guardian->f_religionId = $this->f_religionId;
            $guardian->f_address = $this->f_address;

            // Mother_INPUTS
            $guardian->m_name = ['en' => $this->m_name_en, 'ar' => $this->m_name_ar];
            $guardian->m_nid = $this->m_nid;
            $guardian->m_pid = $this->m_pid;
            $guardian->m_phone = $this->m_phone;
            $guardian->m_job = ['en' => $this->m_job_en, 'ar' => $this->m_job_ar];
            $guardian->m_nationalityId = $this->m_nationalityId;
            $guardian->m_bloodtypeId = $this->m_bloodtypeId;
            $guardian->m_religionId = $this->m_religionId;
            $guardian->m_address = $this->m_address;
            $guardian->save();

            if (!empty($this->photos)) {
                foreach ($this->photos as $photo) {
                    $photo->storeAs($this->f_nid, $photo->getClientOriginalName(), $disk = 'guardian_attachments');
                    GuardianAttachment::create([
                        'file_name' => $photo->getClientOriginalName(),
                        'guardian_id' => Guardian::latest()->first()->id,
                    ]);
                }
            }

            $this->successMessage = __('messages.success_save');
            $this->clearForm();
            $this->currentStep = 1;
        } catch (\Exception $e) {
            $this->catchError = $e->getMessage();
        };
    }

    public function editForm($id)
    {
        $this->show_table = false;
        $this->updateMode = true;
        $guardian = Guardian::where('id', $id)->first();
        $this->guardian_id = $id;
        $this->email = $guardian->email;
        $this->password = $guardian->password;
        $this->f_name_en = $guardian->getTranslation('f_name', 'en');
        $this->f_name_ar = $guardian->getTranslation('f_name', 'ar');
        $this->f_job_en = $guardian->getTranslation('f_job', 'en');
        $this->f_job_ar = $guardian->getTranslation('f_job', 'ar');;
        $this->f_nid = $guardian->f_nid;
        $this->f_pid = $guardian->f_pid;
        $this->f_phone = $guardian->f_phone;
        $this->f_nationalityId = $guardian->f_nationalityId;
        $this->f_bloodtypeId = $guardian->f_bloodtypeId;
        $this->f_religionId = $guardian->f_religionId;
        $this->f_address = $guardian->f_address;

        $this->m_name_en = $guardian->getTranslation('m_name', 'en');
        $this->m_name_ar = $guardian->getTranslation('m_name', 'ar');
        $this->m_job_en = $guardian->getTranslation('m_job', 'en');
        $this->m_job_ar = $guardian->getTranslation('m_job', 'ar');;
        $this->m_nid = $guardian->m_nid;
        $this->m_pid = $guardian->m_pid;
        $this->m_phone = $guardian->m_phone;
        $this->m_nationalityId = $guardian->m_nationalityId;
        $this->m_bloodtypeId = $guardian->m_bloodtypeId;
        $this->m_religionId = $guardian->m_religionId;
        $this->m_address = $guardian->m_address;
    }

    public function submitFormUpdate()
    {

        if ($this->guardian_id) {
            $guardian = Guardian::find($this->guardian_id);
            $guardian->update([
                'f_name' => ['en' => $this->f_name_en, 'ar' => $this->f_name_ar],
                'f_job' => ['en' => $this->f_job_en, 'ar' => $this->f_job_ar],
                'f_pid' => $this->f_pid,
                'f_nid' => $this->f_nid,
                'f_phone' => $this->f_phone,
                'f_nationalityId' => $this->f_nationalityId,
                'f_bloodtypeId' => $this->f_bloodtypeId,
                'f_religionId' => $this->f_religionId,
                'f_address' => $this->f_address,

                'm_name' => ['en' => $this->m_name_en, 'ar' => $this->m_name_ar],
                'm_job' => ['en' => $this->m_job_en, 'ar' => $this->m_job_ar],
                'm_pid' => $this->m_pid,
                'm_nid' => $this->m_nid,
                'm_phone' => $this->m_phone,
                'm_nationalityId' => $this->m_nationalityId,
                'm_bloodtypeId' => $this->m_bloodtypeId,
                'm_religionId' => $this->m_religionId,
                'm_address' => $this->m_address,
            ]);
        }

        return redirect()->to('/add_guardian');
    }

    //clearForm
    public function clearForm()
    {
        $this->email = '';
        $this->password = '';
        $this->f_name_en = '';
        $this->f_name_ar = '';
        $this->f_job_en = '';
        $this->f_job_ar = '';
        $this->f_nid = '';
        $this->f_pid = '';
        $this->f_phone = '';
        $this->f_nationalityId = '';
        $this->f_bloodtypeId = '';
        $this->f_religionId = '';
        $this->f_address = '';

        $this->m_name_en = '';
        $this->m_name_ar = '';
        $this->m_job_en = '';
        $this->m_job_ar = '';
        $this->m_nid = '';
        $this->m_pid = '';
        $this->m_phone = '';
        $this->m_nationalityId = '';
        $this->m_bloodtypeId = '';
        $this->m_religionId = '';
        $this->m_address = '';
    }

    public function showFormAdd()
    {
        $this->show_table = false;
    }

    public function delete($id)
    {
        try {
            $guardian = Guardian::findOrFail($id);
            $attachments = GuardianAttachment::where('guardian_id', $id)->get();

            if (isset($attachments)) {
                foreach ($attachments as $key => $attachment) {
                    $attachment->delete();
                }
                Storage::disk('guardian_attachments')->deleteDirectory($guardian->f_nid);
            }

            $guardian->delete();

            $this->successMessage = __('messages.success_delete');
            return redirect('add_guardian')->with($this->successMessage);
        } catch (\Exception $e) {
            $this->catchError = $e->getMessage();
        };
    }
}
