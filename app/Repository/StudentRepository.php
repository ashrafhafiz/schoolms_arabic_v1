<?php

namespace App\Repository;

use App\Models\BloodType;
use App\Models\Gender;
use App\Models\Grade;
use App\Models\Guardian;
use App\Models\Image;
use App\Models\Level;
use App\Models\Nationality;
use App\Models\Section;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentRepository implements IStudentRepository
{

    public function getAllStudents()
    {
        return Student::all();
    }

    public function getStudentByID($id)
    {
        return Student::findOrFail($id);
    }

    public function createStudent()
    {
        $data['levels'] = Level::all();
        $data['grades'] = Grade::all();
        $data['sections'] = Section::all();
        $data['genders'] = Gender::all();
        $data['nationalities'] = Nationality::all();
        $data['blood_types'] = BloodType::all();
        $data['guardians'] = Guardian::all();

        return view('student.create', $data);
    }

    public function storeStudent($request)
    {
        DB::beginTransaction();

        try {
            $student = new Student();
            $student->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
            $student->email = $request->email;
            $student->password = Hash::make($request->password);
            $student->gender_id = $request->gender_id;
            $student->nationality_id = $request->nationality_id;
            $student->blood_type_id = $request->blood_type_id;
            $student->dob = $request->dob;
            $student->level_id = $request->level_id;
            $student->grade_id = $request->grade_id;
            $student->section_id = $request->section_id;
            $student->guardian_id = $request->guardian_id;
            $student->academic_year = $request->academic_year;
            $student->save();

            // Insert img
            if ($request->hasfile('photos')) {
                foreach ($request->file('photos') as $file) {
                    $name = $file->getClientOriginalName();
                    $file->storeAs('attachments/students/' . $student->name, $file->getClientOriginalName(), 'student_attachments');

                    // insert in image_table
                    $image = new Image();
                    $image->url = $name;
                    $image->imageable_id = $student->id;
                    $image->imageable_type = 'App\Models\Student';
                    $image->save();
                }
            }

            DB::commit();

            toastr()->success(trans('messages.success_save'));
            return redirect()->route('student.create');
        } catch (\Exception $e) {
            DB::rollback();

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function editStudent($id)
    {
        $data['levels'] = Level::all();
        $data['grades'] = Grade::all();
        $data['sections'] = Section::all();
        $data['genders'] = Gender::all();
        $data['nationalities'] = Nationality::all();
        $data['blood_types'] = BloodType::all();
        $data['guardians'] = Guardian::all();

        $data['student'] = $this->getStudentByID($id);

        return view('student.edit', $data);
    }


    public function updateStudent($request)
    {
        try {
            $student = $this->getStudentByID($request->id);
            $student->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
            $student->email = $request->email;
            $student->password = Hash::make($request->password);
            $student->gender_id = $request->gender_id;
            $student->nationality_id = $request->nationality_id;
            $student->blood_type_id = $request->blood_type_id;
            $student->dob = $request->dob;
            $student->level_id = $request->level_id;
            $student->grade_id = $request->grade_id;
            $student->section_id = $request->section_id;
            $student->guardian_id = $request->guardian_id;
            $student->academic_year = $request->academic_year;
            $student->save();

            toastr()->success(trans('messages.success_edit'));
            return redirect()->route('student.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function deleteStudent($request)
    {
        try {
            $student = $this->getStudentByID($request->id);
            $student->delete();

            toastr()->success(trans('messages.success_delete'));
            return redirect()->route('student.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
