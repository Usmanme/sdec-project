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
    Route::get('/','index')->name('course.list');
    Route::get('delete','deleteCourse')->name('course.delete');
    Route::get('create/{id?}','createOrEdit')->name('course.createOrEdit');
    Route::post('storeOrUpdate','storeOrUpdate')->name('course.storeOrUpdate');
} );

// Frontend Routes
Route::get('/homepage', function () {
    return view('front-end/home/main');
});
Route::get('/single-course', function () {
    return view('front-end/course/single-course');
});
