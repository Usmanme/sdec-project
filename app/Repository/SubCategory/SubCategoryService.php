<?php

namespace App\Repository\SubCategory;

use App\Models\Category;
use App\Models\Course;
use App\Models\SubCategory;
use App\Traits\Image;
use Illuminate\Support\Facades\DB;

class SubCategoryService implements SubCategoryInterface
{
    use Image;
    public function createOrEdit($id=null)
    {
        $data['title'] = "Add New Sub Category";
        $data['breadcrumb'] = 'subCategory.createOrEdit';
        $data['page_title'] = 'Add New Sub Category';
        $data['submit_button'] = 'Save Sub Category';
        $data['categories'] = Category::active()->get(['id','name']);
        if(isset($id) && !is_null($id))
        {
            $id = (int)decryptParams($id);
            $data['title'] = "Update Sub Category";
            $data['sub_category'] = SubCategory::find($id);
            $data['breadcrumb'] = 'subCategory.storeOrUpdate';
            $data['page_title'] = 'Update Sub Category';
            $data['submit_button'] = 'Update Sub Category';
        }
        return view("app.admin-panel.sub-category.create",compact('data'));

    }

    public function storeOrUpdate($request)
    {
        $sub_category_status = array_key_exists('sub_category_status' ,$request);
        $category_exists = array_key_exists('id' ,$request);
        $id = (int)$request['id'];
        // try
        // {
            DB::transaction(function() use($request, $sub_category_status, $category_exists ,$id){
                if(isset($category_exists) && isNotZeroAndNull($id) )
                {
                    $sub_category = SubCategory::find($id);
                    // $category_image = sub_category::PATH.$sub_category['image'];
                    // if(File::exists($category_image))
                    //     File::delete($category_image);
                }
                else
                    $sub_category = (new SubCategory());
                $sub_category->name = $request['name'] ?? null;
                $sub_category->description = $request['description'] ?? null;
                $sub_category->status = $sub_category_status ? 'active' : 'inactive';
                $sub_category->category_id = $request['category'];
                $sub_category->user_id = auth()->user()->id;
                $sub_category->created_at = now();
                // $sub_category->image = $this->storeImage(Category::PATH, $request['image'] ?? '');
                $sub_category->save();
            });
        // }
        // catch (\Exception $ex)
        // {
        //     return redirect()->back()->withDanger($ex->getMessage());
        // }
    }

    public function deleteSubCategory($ids)
    {
        try
        {
            $sub_categories = SubCategory::whereIn('id', $ids)->get();
            foreach($sub_categories as $sub_category)
            {
                // $category_image = Category::PATH.$category->image;
                // if(File::exists($category_image))
                //     File::delete($category_image);
                $sub_category->delete();
            }
        }
        catch (\Exception $ex)
        {
            return redirect()->back()->withDanger("Error.". $ex->getMessage());
        }
    }
}
