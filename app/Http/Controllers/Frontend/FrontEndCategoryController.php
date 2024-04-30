<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class FrontEndCategoryController extends Controller
{
    public function categories ( Request $request )
    {
        $data['courses'] = Course::active();
        if(!empty($request->input('category')))
        {
            $data['courses'] = $data['courses']
            ->join('sub_category_courses', 'courses.id', 'sub_category_courses.course_id')
            ->where('sub_category_courses.category_id', $request->input('category'))
            ->where('sub_category_courses.sub_category_id', $request->input('sub_category'))
            ->groupBy('courses.id', 'courses.title', 'courses.description');

            if (!is_null($request->input('course_name')) && !empty($request->input('course_name')))
                $data['courses'] = $data['courses']->where('courses.title', 'LIKE', "%{$request->input('course_name')}%");
        }

        $data['courses'] = $data['courses']->select(['courses.id','courses.title','courses.description'])->paginate(12)->withQueryString();
        $data['categories'] = Category::active()->select(['id','name'])->get();
        $data['sub_categories'] = SubCategory::active()->select(['id','name'])->get();
        return view('front-end.category.courses',compact('data'));
    }
}
