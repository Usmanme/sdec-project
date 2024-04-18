<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function home(Request $request)
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

            // $data['courses'] = $data['courses']->get(['courses.id','title','description']);
            // $data['selected_courses'] = DB::select(
            //     "
            //     SELECT courses.id,courses.title,courses.description FROM `courses` JOIN sub_category_courses ON courses.id = sub_category_courses.course_id WHERE sub_category_courses.category_id=2 AND sub_category_courses.sub_category_id=3 AND courses.title LIKE ' % C+ % ' GROUP BY courses.id;
            //     "
            // );
            return apiSuccessResponse($data['courses']);
        }
        $data['categories'] = Category::active()->get(['id', 'name']);
        $data['courses'] = $data['courses']->get(['id', 'title', 'description']);
        return view('front-end.home.main', compact('data'));
    }

    public function getSubCategories(Request $request)
    {
        $sub_categories = getSubCategories((int)$request->input('category_id'));
        if (count($sub_categories) > 0 && !is_null($sub_categories)) {
            return apiSuccessResponse($sub_categories);
        } else {
            return apiErrorResponse();
        }
    }
}
