<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class FrontEndCourseController extends Controller
{
    public function details ( $slug )
    {;
        $course = Course::with(['category','subCategories'])->whereSlug( $slug )->first();
        return view('front-end.course.single-course',compact('course'));
    }
}
