<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        $data['courses'] = Course::with('singleCourseCategory')->active();

        if( $request->ajax() ) {
            $data['courses'] = $data['courses']
            ->join('sub_category_courses', 'courses.id', 'sub_category_courses.course_id')
            ->where('sub_category_courses.category_id', $request->input('category'))
            ->where('sub_category_courses.sub_category_id', $request->input('sub_category'))
            ->groupBy('courses.id', 'courses.title', 'courses.description');

            if (!is_null($request->input('course_name'))) {
                $data['courses'] = $data['courses']->where('courses.title', 'LIKE', "%{$request->input('course_name')}%");
            }

            $data['courses'] = $data['courses']
            ->get(['courses.id', 'courses.title', 'courses.description']);

            return apiSuccessResponse($data['courses']);
        }
        $data['categories'] = Category::active()->get(['id', 'name']);
        $data['courses'] = $data['courses']->limit(4)->latest()->get(['courses.id', 'title', 'description']);
        $data['events'] = Event::active()->select(['id','title','start_date_time','end_date_time','location'])->limit(4)->get();
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
