<?php

namespace App\Repository\Course ;

use App\Models\Category;
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
        if(isset($id) && !is_null($id))
        {
            $id = (int)decryptParams($id);
            $data['title'] = "Update Category";
            $data['category'] = Category::find($id);
            $data['breadcrumb'] = 'category.update';
            $data['page_title'] = 'Update Category';
            $data['submit_button'] = 'Update Category';
        }
        return view("app.admin-panel.course.create",compact('data'));

    }

    public function storeOrUpdate($request)
    {
        $category_status = array_key_exists('category_status' ,$request);
        $category_exists = array_key_exists('id' ,$request);
        $id = (int)$request['id'];
        try
        {
            DB::transaction(function() use($request, $category_status, $category_exists ,$id){
                if(isset($category_exists) && $id != 0)
                {
                    $category = Category::find($id);
                    $category_image = Category::PATH.$category['image'];
                    if(File::exists($category_image))
                        File::delete($category_image);
                }
                else
                    $category = (new Category());
                $category->name = $request['name'] ?? '';
                $category->slug = $request['slug'] ?? '';
                $category->description = $request['description'] ?? '';
                $category->meta_title = $request['meta_title'] ?? '';
                $category->meta_keyword = $request['meta_keyword'] ?? '';
                $category->meta_description = $request['meta_description'] ?? '';
                $category->status = $category_status ? 1 : 0;
                $category->image = $this->storeImage(Category::PATH, $request['image'] ?? '');
                $category->save();
            });
            return redirect()->route('categories')->withSuccess('Category Added/Updated Successfully.');
        }
        catch (\Exception $ex)
        {
            return redirect()->back()->withDanger($ex->getMessage());
        }
    }

    public function getImage($id)
    {
        try
        {
            $category_image = Category::find($id)->image;
            return response()->json([
                'status'    => 200,
                'image'     => $category_image
            ]);
        }
        catch (\Exception $ex)
        {
            return response()->json([
                'status' => 400,
                'message' => "Data Not Found"
            ]);
        }
    }

    public function categoryDetails($id)
    {
        try
        {
            $category_details = Category::find($id);
            return response()->json([
                'status' => 200,
                'message' => "Data Found",
                'data'  => $category_details

            ]);
        }
        catch (\Exception $ex)
        {
            return response()->json([
                'status' => 400,
                'message' => "Data Not Found"
            ]);
        }
    }

    public function delete($ids)
    {
        try
        {
            $categories = Category::whereIn('id', $ids)->get();
            foreach($categories as $category)
            {
                $category_image = Category::PATH.$category->image;
                if(File::exists($category_image))
                    File::delete($category_image);
                $category->delete();
            }
            return redirect()->back()->withSuccess("Category Deleted Successfully.");
        }
        catch (\Exception $ex)
        {
            return redirect()->back()->withDanger("Error.". $ex->getMessage());
        }
    }
}
