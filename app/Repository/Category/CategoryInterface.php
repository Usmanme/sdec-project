<?php

namespace App\Repository\Category;

interface CategoryInterface
{
    public function createOrEdit($id=null);
    public function storeOrUpdate($request);
    public function deleteCategory($ids);
}
