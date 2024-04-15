<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home ( Request $request )
    {
        $data['categories'] = Category::active()->get();
        return view('front-end.home.main');
    }
}
