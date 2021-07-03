<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Repository\IStudentRepository;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    protected $createStudentFn;
    public function __construct(IStudentRepository $createStudentFn)
    {
        $this->createStudentFn = $createStudentFn;
    }


    public function index()
    {
        $data['students'] = $this->createStudentFn->getAllstudents();
        return view('student.index', $data);
    }


    public function create()
    {
        return $this->createStudentFn->createStudent();
    }


    public function store(StoreStudentRequest $request)
    {
        return $this->createStudentFn->storeStudent($request);
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }



    public function destroy($id)
    {
        //
    }
}
