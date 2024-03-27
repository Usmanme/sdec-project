<?php

namespace App\Http\Controllers\Admin\Category;

use App\DataTables\Category\CategoryDataTable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        return $categoryDataTable->render('app.admin-panel.category.index');

    }

    public function create($id=null)
    {
        return $this->category->create($id);
    }

    public function storeOrUpdate(Request $request)
    {
        $this->validate($request,[
            'name'              => 'required',
            'slug'              => 'required',
            'description'       => 'required',
            'meta_title'        => 'required',
            'meta_keyword'      => 'required',
            'meta_description'  => 'required',
        ]);
        return $this->category->storeOrUpdate($request->all());
    }

    public function getImage(Request $request)
    {
        $id = (int)$request->id;
        return $this->category->getImage($id);
    }

    public function categoryDetails(Request $request)
    {
        $id = (int)$request->id;
        return $this->category->categoryDetails($id);
    }

    public function delete(Request $request)
    {
        $ids = $request->chkData;
        return $this->category->delete($ids);
    }
}
