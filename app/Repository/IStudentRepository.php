<?php

namespace App\Repository;

interface IStudentRepository
{
    public function getAllstudents();

    public function getStudentByID($id);

    public function createStudent();

    public function storeStudent($request);

    public function editStudent($id);

    public function updateStudent($request);

    public function deleteStudent($request);
}
