<?php

namespace App\Imports;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SubCategoryImport implements ToCollection, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public $failure_records = 0;
    public function collection(Collection $collection)
    {
        $category_id = 1;
        foreach ($collection as $cat) {
            $check_cat = SubCategory::whereName($cat['name'])->count();
            $category_existance = Category::whereName( $cat['category'] )->first();
            if( empty( $category_existance ) || is_null( $category_existance ) )
            {
                $category = new Category();
                $category->name = $cat['category'];
                $category->description = null;
                $category->status = 'active';
                $category->user_id = auth()?->user()?->id;
                $category->save();
                $category_id = $category->id;
            }
            else
            {
                $category_id = $category_existance->id;
            }

            if ($check_cat == 0 && !is_null($cat['name']) && !empty($cat['name'])) {
                $sub_category = new SubCategory();
                $sub_category->name = $cat['name'] ?? null;
                $sub_category->description = $cat['description'] ?? null;
                $sub_category->category_id = $category_id;
                
                $sub_category->status = "active";
                $sub_category->user_id = auth()?->user()?->id ?? 1;
                $sub_category->created_at = now();
                $sub_category->updated_at = now();
                $sub_category->save();
            } else {
                $this->failure_records += 1;
            }
        }
    }
    public function chunkSize(): int
    {
        return 1000;
    }
    public function batchSize(): int
    {
        return 1000;
    }

    public function getFailureRecords()
    {
        return $this->failure_records;
    }
}
