<?php

namespace App\Repository\Category;

interface CategoryInterface
{
    public function create($id=null);
    public function storeOrUpdate($request);
    public function getImage($id);
    public function categoryDetails($id);
    public function delete($ids);
}
