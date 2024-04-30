<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class FrontEndCourseController extends Controller
{
    public function details ( $id )
    {
        $id = (int)decryptParams($id);
        $course = Course::with(['category','subCategories'])->find($id);
        return view('front-end/course/single-course',compact('course'));
    }
}
