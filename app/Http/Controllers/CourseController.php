<?php

namespace App\Http\Controllers;

use App\Imports\CourseImport;
use App\Models\Course;
use App\Repository\Course\CourseInterface;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CourseController extends Controller
{
    public $course = null;
    public function __construct( CourseInterface $courseInterface )
    {
        $this->course = $courseInterface;
    }

    public function index ()
    {
        $data['courses'] = Course::with('user:id,name')->paginate(10);
        return view('app.admin-panel.course.index',compact('data'));
    }
    public function createOrEdit( $id=null )
    {
        return $this->course->create($id);
    }

    public function storeOrUpdate ( Request $request )
    {
        $validated_data = $this->validate($request,[
            'name'=>'required',
            'description'=>'required',
            'program_code'=>'required',
            'venue'=>'required',
            'fee'=>'required|integer',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'id'=>'nullable',
            'course_status'=>'nullable'
        ]);
        $this->course->storeOrUpdate( $validated_data );
        return redirect()->route('course.list')->withSuccess('Course Added/Updated Successfully.');
    }

    public function deleteCourse( Request $request )
    {
        $ids = $request->chkTableRow;
        return $this->course->deleteCourse($ids);
    }

    public function importCourseForm()
    {
        $data['title'] = "Import Courses";
        $data['breadcrumb'] = 'course.importCourseForm';
        $data['page_title'] = 'Import Courses';
        $data['submit_button'] = 'Import';
        return view('app.admin-panel.course.import',compact('data'));
    }

    public function importCourses( Request $request )
    {
        $validated_data = $this->validate($request,[
            'file'=>'required|file|mimes:xls,xlsx',
        ],
        [
            'file.required' => 'Please select an Excel file.',
            'file.mimes' => 'The file must be an Excel file with extension .xls or .xlsx.',
        ]);

        Excel::import( new CourseImport(), $request->file('file') );
    }
}
