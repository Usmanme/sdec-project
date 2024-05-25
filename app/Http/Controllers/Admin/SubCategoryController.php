<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use App\Repository\SubCategory\SubCategoryInterface;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
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
    public function importSubCategoryForm()
    {
        $data['title'] = "Import Sub Category";
        $data['breadcrumb'] = 'sub-category.importSubCategoryForm';
        $data['page_title'] = 'Import Sub Category';
        $data['submit_button'] = 'Import';
        return view('app.admin-panel.sub-category.import',compact('data'));
    }

    public function importSubCategory( Request $request )
    {
        // $validated_data = $this->validate($request,[
        //     'file'=>'required|file|mimes:xls,xlsx',
        // ],
        // [
        //     'file.required' => 'Please select an Excel file.',
        //     'file.mimes' => 'The file must be an Excel file with extension .xls or .xlsx.',
        // ]);
        // $sub_category_import = New SubCategoryImport();
        // Excel::import( $sub_category_import, $request->file('file') );
        // if( $sub_category_import->getFailureRecords() > 0 ) {
        //     return to_route('sub-category.list')->withDanger($sub_category_import->getFailureRecords().' are duplicate enteries/missing values.');
        // }else {
        //     return to_route('sub-category.list')->withSuccess('Sub Category Imported.');
        // }
    }
}
