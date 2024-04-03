<?php

namespace App\Http\Controllers;

use App\Repository\Course\CourseInterface;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public $course = null;
    public function __construct( CourseInterface $courseInterface )
    {
        $this->course = $courseInterface;
    }
    public function create()
    {
        return $this->course->create();
    }

    public function storeOrUpdate ( Request $request )
    {
        dd($request->all());
    }
}
