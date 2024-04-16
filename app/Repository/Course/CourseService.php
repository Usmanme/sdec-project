<?php

namespace App\Repository\Course ;

use App\Models\Category;
use App\Models\Country;
use App\Models\Course;
use App\Models\SubCategoryCourse;
use App\Repository\Course\CourseInterface;
use App\Traits\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class CourseService implements CourseInterface
{
    use Image;
    public function create($id=null)
    {
        $data['title'] = "Add New Course";
        $data['breadcrumb'] = 'course.createOrEdit';
        $data['page_title'] = 'Add New Course';
        $data['submit_button'] = 'Save Course';
        $data['countries'] = Country::selectRaw("CONCAT(countries.name, '-', cities.name) as country_city")
        ->join('cities', 'countries.id', 'cities.country_id')
        ->get();
        $data['categories'] = Category::active()->get(['id','name']);
        if(isset($id) && !is_null($id))
        {
            $id = (int)decryptParams($id);
            $data['title'] = "Update Course";
            $data['course'] = Course::leftJoin('sub_category_courses','courses.id','=','sub_category_courses.course_id')
            ->select('courses.id as course_id','courses.title','courses.description','courses.program_code','courses.venue','courses.fee','courses.start_date','courses.end_date','courses.status','sub_category_courses.category_id','sub_category_courses.sub_category_id')
            ->where('courses.id',$id)
            ->first();
            // $data['courses'] = Course::with('subCategoryCourse')->find($id);
            // dd($data['courses']);
            // Course::leftJoin('sub_category_courses', 'courses.id', '=', 'sub_category_courses.course_id')
            // ->select('courses.id as course_id', 'courses.title', 'courses.description', 'courses.program_code', 'courses.venue', 'courses.fee', 'courses.start_date', 'courses.end_date', 'courses.status', 'sub_category_courses.category_id', 'sub_category_courses.sub_category_id')
            // ->where('courses.id', $id)
            // ->first();
            if ($data['course'] && !$data['course']->category_id && !$data['course']->sub_category_id) {
                $data['course']->category_id = null; // or set to default value
                $data['course']->sub_category_id = null; // or set to default value
            }
            // dd($data);
            $data['breadcrumb'] = 'course.storeOrUpdate';
            $data['page_title'] = 'Update Course';
            $data['submit_button'] = 'Update Course';
        }
        // dd($data['course']);
        return view("app.admin-panel.course.create",compact('data'));

    }

    public function storeOrUpdate($request)
    {
        // dd($request);
        $course_status = array_key_exists('course_status' ,$request);
        $course_exists = array_key_exists('id' ,$request);
        $id = (int)$request['id'];

        DB::transaction(function() use($request, $course_status, $course_exists ,$id){
            if(isset($course_exists) && $id != 0)
            {
                $course = Course::find($id);
                $sub_category_courses = SubCategoryCourse::where('course_id',$course->id)->first();
                if(!is_null($sub_category_courses))
                {
                    $sub_category_courses->category_id = $request['category'];
                    $sub_category_courses->sub_category_id = $request['sub_category'];
                    $sub_category_courses->save();
                }
                else
                {
                    $data =
                    [
                        'course_id'     => $course->id,
                        'category'   => (int)$request['category'],
                        'sub_categories'  => (array)$request['sub_category'],
                        'user_id'       => auth()->user()->id
                    ];
                    $sub_category_courses = createSubCategoryCourse($data);
                }
            }
            else
            {
                $course = (new Course());
            }
            $course->title = $request['name'] ?? null;
            $course->description = $request['description'] ?? null;
            $course->program_code = $request['program_code'] ?? null;
            $course->venue = $request['venue'] ?? null;
            $course->fee = $request['fee'] ?? null;
            $course->start_date = $request['start_date'] ?? null;
            $course->end_date = $request['end_date'] ?? null;
            $course->status = $course_status ? 'active' : 'inactive';
            $course->user_id = auth()?->user()?->id;
            $course->created_at = now();
            // $course->image = $this->storeImage(Category::PATH, $request['image'] ?? '');
            $course->save();

            // if(!isset($id))
            // {
            //     $data =
            //     [
            //         'course_id'     => $course->id,
            //         'category'   => (int)$request['category'],
            //         'sub_category'  => (int)$request['sub_category'],
            //         'user_id'       => auth()->user()->id
            //     ];
            //     $sub_category_courses = createSubCategoryCourse($data);
            // }
            // else{

                $data =
                [
                    'course_id'     => $course->id,
                    'category'   => (int)$request['category'],
                    'sub_categories'  => (array)$request['sub_category'],
                    'user_id'       => auth()->user()->id
                ];
                $sub_category_courses = createSubCategoryCourse($data);
            // }
        });
        // return true;
    }

    public function deleteCourse($ids)
    {
        try
        {
            $courses = Course::whereIn('id', $ids)->get();
            foreach($courses as $course)
            {
                $sub_category_courses = SubCategoryCourse::where('course_id',$course['id'])->first();
                $sub_category_courses->delete();
                $course->delete();
            }
            return redirect()->back()->withSuccess("Course Deleted Successfully.");
        }
        catch (\Exception $ex)
        {
            return redirect()->back()->withDanger("Error.". $ex->getMessage());
        }
    }
}
