<?php

namespace App\Repository\Course;

interface CourseInterface
{
    public function create($id=null);
    public function storeOrUpdate($request);
    public function deleteCourse($ids);
}
