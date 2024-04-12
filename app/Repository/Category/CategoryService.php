<?php

namespace App\Repository\Category;

use App\Models\Category;
use App\Models\Course;
use App\Traits\Image;
use Illuminate\Support\Facades\DB;

class CategoryService implements CategoryInterface
{
    use Image;
    public function createOrEdit($id=null)
    {
        $data['title'] = "Add New Category";
        $data['breadcrumb'] = 'category.createOrEdit';
        $data['page_title'] = 'Add New Category';
        $data['submit_button'] = 'Save Category';
        if(isset($id) && !is_null($id))
        {
            $id = (int)decryptParams($id);
            $data['title'] = "Update Category";
            $data['category'] = Category::find($id);
            $data['breadcrumb'] = 'category.storeOrUpdate';
            $data['page_title'] = 'Update Category';
            $data['submit_button'] = 'Update Category';
        }
        return view("app.admin-panel.category.create",compact('data'));

    }

    public function storeOrUpdate($request)
    {
        // dd($request);
        $category_status = array_key_exists('category_status' ,$request);
        $category_exists = array_key_exists('id' ,$request);
        $id = (int)$request['id'];
        // try
        // {
            DB::transaction(function() use($request, $category_status, $category_exists ,$id){
                if(isset($category_exists) && $id != 0 && !is_null($id))
                {
                    $course = Category::find($id);
                    // $category_image = Course::PATH.$course['image'];
                    // if(File::exists($category_image))
                    //     File::delete($category_image);
                }
                else
                    $course = (new Category());
                $course->name = $request['name'] ?? null;
                $course->description = $request['description'] ?? null;
                $course->status = $category_status ? 'active' : 'inactive';
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

    public function deleteCategory($ids)
    {
        try
        {
            $categories = Category::whereIn('id', $ids)->get();
            foreach($categories as $category)
            {
                // $category_image = Category::PATH.$category->image;
                // if(File::exists($category_image))
                //     File::delete($category_image);
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
