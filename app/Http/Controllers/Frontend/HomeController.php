<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home ( Request $request )
    {
        $data['courses'] = Course::with('singleCourseCategory')->active();
        if( $request->ajax() ) {
            $data['courses'] = $data['courses']
            ->join('sub_category_courses','courses.id','sub_category_courses.course_id')
            ->where('sub_category_courses.category_id',$request->input('category'))
            ->where('sub_category_courses.sub_category_id',$request->input('sub_category'));
            if( !is_null($request->input('course_name')) ){
                $data['courses'] = $data['courses']->where('title','LIKE',"%{$request->input('course_name')}%");
            }
            $data['courses'] = $data['courses']->get(['courses.id','title','description']);
            return apiSuccessResponse($data['courses']);
        }
        $data['categories'] = Category::active()->get(['id','name']);
        $data['courses'] = $data['courses']->get(['id','title','description']);
        return view('front-end.home.main',compact('data'));
    }
}
