<?php

namespace App\Imports;

use App\Models\Category;
use Maatwebsite\Excel\Concerns\ToModel;

class CategoryImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public $failure_records = 0;
    public function model(array $row)
    {

        foreach ($row as $cat) {
            $check_cat = Category::whereTitle($cat['name'])->count();
            if ($check_cat == 0 && !is_null($cat['name']) && !empty($cat['name'])) {
                $category = new Category();
                $category->name = $cat['name'] ?? null;
                $category->description = $cat['description'] ?? null;
                $category->status = "active";
                $category->user_id = auth()?->user()?->id ?? 1;
                $category->created_at = now();
                $category->updated_at = now();
                $category->save();
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
