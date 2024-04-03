<?php

namespace App\Repository\Course;

interface CourseInterface
{
    public function create($id=null);
    public function storeOrUpdate($request);
    public function getImage($id);
    public function categoryDetails($id);
    public function delete($ids);
}
