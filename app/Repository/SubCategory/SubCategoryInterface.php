<?php

namespace App\Repository\SubCategory;

interface SubCategoryInterface
{
    public function createOrEdit($id=null);
    public function storeOrUpdate($request);
    public function deleteSubCategory($ids);
}
