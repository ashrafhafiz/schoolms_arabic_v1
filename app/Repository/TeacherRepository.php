<?php

namespace App\Repository;

use App\Models\Gender;
use App\Models\Specialization;
use App\Models\Teacher;
use Illuminate\Support\Facades\Hash;

class TeacherRepository implements ITeacherRepository
{

    public function getAllTeachers()
    {
        return Teacher::all();
    }

    public function getTeachByID($id)
    {
        return Teacher::findOrFail($id);
    }

    public function getAllGenders()
    {
        return Gender::all();
    }

    public function getAllSpecializations()
    {
        return Specialization::all();
    }

    public function storeTeacherRecord($request)
    {
        try {
            $teacher = new Teacher();
            $teacher->email = $request->email;
            $teacher->password =  Hash::make($request->password);
            $teacher->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
            $teacher->specialization_id = $request->specialization_id;
            $teacher->gender_id = $request->gender_id;
            $teacher->join_date = $request->join_date;
            $teacher->address = $request->address;
            $teacher->save();

            toastr()->success(__('messages.success_save'));
            return redirect()->route('teacher.index');
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function updateTeacherRecord($request)
    {
        try {
            $teacher = Teacher::findOrFail($request->id);
            $teacher->email = $request->email;
            $teacher->password =  Hash::make($request->password);
            $teacher->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
            $teacher->specialization_id = $request->specialization_id;
            $teacher->gender_id = $request->gender_id;
            $teacher->join_date = $request->join_date;
            $teacher->address = $request->address;
            $teacher->save();

            toastr()->success(trans('messages.success_edit'));
            return redirect()->route('teacher.index');
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function deleteTeacherRecord($request)
    {
        try {
            $teacher = Teacher::findOrFail($request->id);
            $teacher->delete();

            toastr()->success(trans('messages.success_delete'));
            return redirect()->route('teacher.index');
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
}
