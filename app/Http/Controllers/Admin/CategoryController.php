<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Category\CategoryDataTable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Repository\Category\CategoryInterface;

class CategoryController extends Controller
{
    public $category = null;
    public function __construct(CategoryInterface $categoryInterface)
    {
        $this->category = $categoryInterface;
    }

    public function index(CategoryDataTable $categoryDataTable)
    {
        $data['categories'] = Category::with('user:id,name')->paginate(10);
        return view('app.admin-panel.category.index',compact('data'));
    }

    public function createOrEdit($id=null)
    {
        return $this->category->createOrEdit($id);
    }

    public function storeOrUpdate(Request $request)
    {
        $validated_data = $this->validate($request,[
            'name'              => 'required',
            'description'       => 'required',
            'id'                =>'nullable',
            'category_status'=>'nullable'
        ]);
        $this->category->storeOrUpdate( $validated_data );
        return redirect()->route('category.list')->withSuccess('Category Added/Updated Successfully.');
    }

    public function deleteCategory(Request $request)
    {
        $ids = $request->chkTableRow;
        return $this->category->deleteCategory($ids);
    }
}
