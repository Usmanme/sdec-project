<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home ( Request $request )
    {
        return view('front-end.home.main');
    }
}
