<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeacherRequest;
use Illuminate\Http\Request;
use App\Repository\ITeacherRepository;

class TeacherController extends Controller
{
    protected $createTeacherFn;
    public function __construct(ITeacherRepository $createTeacherFn)
    {
        $this->createTeacherFn = $createTeacherFn;
    }


    public function index()
    {
        $teachers = $this->createTeacherFn->getAllTeachers();
        return view('teacher.index', compact('teachers'));
    }


    public function create()
    {
        $data['genders'] = $this->createTeacherFn->getAllGenders();
        $data['specializations'] = $this->createTeacherFn->getAllSpecializations();
        return view('teacher.create', $data);
    }


    public function store(StoreTeacherRequest $request)
    {
        return $this->createTeacherFn->storeTeacherRecord($request);
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $data['teacher'] = $this->createTeacherFn->getTeachByID($id);
        $data['genders'] = $this->createTeacherFn->getAllGenders();
        $data['specializations'] = $this->createTeacherFn->getAllSpecializations();
        return view('teacher.edit', $data);
    }


    public function update(Request $request)
    {
        return $this->createTeacherFn->updateTeacherRecord($request);
    }


    public function destroy(Request $request)
    {
        return $this->createTeacherFn->deleteTeacherRecord($request);
    }
}
