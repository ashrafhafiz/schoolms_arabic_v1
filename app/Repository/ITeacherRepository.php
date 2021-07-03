<?php

namespace App\Repository;

interface ITeacherRepository
{

    // get all Teachers
    public function getAllTeachers();

    public function getTeachByID($id);

    public function getAllGenders();

    public function getAllSpecializations();

    public function storeTeacherRecord($request);

    public function updateTeacherRecord($request);

    public function deleteTeacherRecord($request);
}
