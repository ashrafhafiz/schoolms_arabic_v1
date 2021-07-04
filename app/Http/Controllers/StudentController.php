<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Repository\IStudentRepository;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    protected $studentFn;
    public function __construct(IStudentRepository $studentFn)
    {
        $this->studentFn = $studentFn;
    }


    public function index()
    {
        $data['students'] = $this->studentFn->getAllstudents();
        return view('student.index', $data);
    }


    public function create()
    {
        return $this->studentFn->createStudent();
    }


    public function store(StoreStudentRequest $request)
    {
        return $this->studentFn->storeStudent($request);
    }


    public function edit($id)
    {
        return $this->studentFn->editStudent($id);
    }


    public function update(StoreStudentRequest $request)
    {
        return $this->studentFn->updateStudent($request);
    }



    public function destroy(Request $request)
    {
        return $this->studentFn->deleteStudent($request);
    }
}
