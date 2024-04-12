<?php

namespace App\Repository\Course ;

use App\Models\Category;
use App\Models\Country;
use App\Models\Course;
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
        if(isset($id) && !is_null($id))
        {
            $id = (int)decryptParams($id);
            $data['title'] = "Update Course";
            $data['course'] = Course::find($id);
            $data['breadcrumb'] = 'course.storeOrUpdate';
            $data['page_title'] = 'Update Course';
            $data['submit_button'] = 'Update Course';
        }
        return view("app.admin-panel.course.create",compact('data'));

    }

    public function storeOrUpdate($request)
    {
        $course_status = array_key_exists('course_status' ,$request);
        $course_exists = array_key_exists('id' ,$request);
        $id = (int)$request['id'];
        // try
        // {
            DB::transaction(function() use($request, $course_status, $course_exists ,$id){
                if(isset($course_exists) && $id != 0)
                {
                    $course = Course::find($id);
                    // $category_image = Course::PATH.$course['image'];
                    // if(File::exists($category_image))
                    //     File::delete($category_image);
                }
                else
                    $course = (new Course());
                $course->title = $request['name'] ?? null;
                $course->description = $request['description'] ?? null;
                $course->program_code = $request['program_code'] ?? null;
                $course->venue = $request['venue'] ?? null;
                $course->fee = $request['fee'] ?? null;
                $course->start_date = $request['start_date'] ?? null;
                $course->end_date = $request['end_date'] ?? null;
                $course->status = $course_status ? 'active' : 'inactive';
                $course->user_id = auth()->user()->id;
                $course->created_at = now();
                // $course->image = $this->storeImage(Category::PATH, $request['image'] ?? '');
                $course->save();
            });
        // }
        // catch (\Exception $ex)
        // {
        //     return redirect()->back()->withDanger($ex->getMessage());
        // }
    }

    public function deleteCourse($ids)
    {
        try
        {
            $courses = Course::whereIn('id', $ids)->get();
            foreach($courses as $course)
            {
                // $category_image = Category::PATH.$category->image;
                // if(File::exists($category_image))
                //     File::delete($category_image);
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
