<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Category\CategoryDataTable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Repository\Category\CategoryInterface;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CategoryImport;
class CategoryController extends Controller
{
    public $category = null;
    public function __construct(CategoryInterface $categoryInterface)
    {
        $this->category = $categoryInterface;
    }

    public function index()
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
    public function importCategory(Request $request)
    {
        $validated_data = $this->validate(
            $request,
            [
                'file' => 'required|file|mimes:xls,xlsx',
            ],
            [
                'file.required' => 'Please select an Excel file.',
                'file.mimes' => 'The file must be an Excel file with extension .xls or .xlsx.',
            ]
        );
        $file = $request->file('file');

        $category_import = new CategoryImport();
        Excel::import($category_import, $request->file('file'));
        if ($category_import->getFailureRecords() > 0) {
            return to_route('category.list')->withDanger($category_import->getFailureRecords() . ' are duplicate enteries/missing values.');
        } else {
            return to_route('category.list')->withSuccess('Category Imported.');
        }
    }
    public function importCategoryForm()
    {
        $data['title'] = "Import Category";
        $data['breadcrumb'] = 'category.importCategoryForm';
        $data['page_title'] = 'Import Category';
        $data['submit_button'] = 'Import';
        return view('app.admin-panel.category.import', compact('data'));
    }
}
