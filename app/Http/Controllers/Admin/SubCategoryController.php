<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use App\Repository\SubCategory\SubCategoryInterface;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public $sub_category = null;
    public function __construct(SubCategoryInterface $subCategoryInterface)
    {
        $this->sub_category = $subCategoryInterface;
    }

    public function index()
    {
        $data['subCategories'] = SubCategory::with('category:id,name','user:id,name')->paginate(10);
        return view('app.admin-panel.sub-category.index',compact('data'));
    }

    public function createOrEdit($id=null)
    {
        return $this->sub_category->createOrEdit($id);
    }

    public function storeOrUpdate(Request $request)
    {
        $validated_data = $this->validate($request,[
            'id'                =>'nullable',
            'name'              => 'required',
            'description'       => 'required',
            'category'          => 'required|exists:categories,id',
            'sub_category_status'=>'nullable'
        ]);
        $this->sub_category->storeOrUpdate( $validated_data );
        return redirect()->route('sub-category.list')->withSuccess('Category Added/Updated Successfully.');
    }

    public function deleteSubCategory(Request $request)
    {
        $ids = $request->chkTableRow;
        $this->sub_category->deleteSubCategory($ids);
        return redirect()->back()->withSuccess("Sub Category Deleted Successfully.");

    }
}
