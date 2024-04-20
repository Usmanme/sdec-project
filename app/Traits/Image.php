<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait Image
{
    public function storeImage($path, $file)
    {
        if($file)
        {
            $file_name = uniqid().$file->getClientOriginalName(); //unique image name
            $file->move(public_path($path), $file_name);
            return $file_name;
        }
    }
}
