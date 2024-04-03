<?php

use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/


require __DIR__ . DIRECTORY_SEPARATOR . 'auth.php';

Route::group([
], function () {
    Route::get('/', function () {
        return redirect()->route('login.view');
    });

    Route::get('dashboard', [DashboardController::class, 'dashboard'])->middleware('auth')->name('dashboard');
    Route::get('cachew/flush', [DashboardController::class, 'cacheFlush'])->name('cache.flush');

});
// Dashboard Routes
Route::controller(CourseController::class)->middleware('auth')->prefix('course')->group( function () {
    Route::get('create','create')->name('course.createOrEdit');
    Route::post('storeOrUpdate/{id?}','storeOrUpdate')->name('course.storeOrUpdate');
} );

// Frontend Routes
Route::get('/homepage', function () {
    return view('front-end/home/main');
});
Route::get('/single-course', function () {
    return view('front-end/course/single-course');
});

Route::get('test',function(){
    $data = array(
        14 => [
            'id' => 15,
            'name' => 'Austria',
            'iso3' => 'AUT',

        ],
        15 => [
            'id' => 16,
            'name' => 'Azerbaijan',
            'iso3' => 'AZE',

        ],
    );
    foreach ($data as & $country) {
        $iso3Index = array_search('iso3', array_keys($country));

        $country = array_slice($country, 0, $iso3Index + 1);
    }

    // Unset the reference to avoid potential conflicts
    unset($country);
    dd($data);
});
