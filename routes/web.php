<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Frontend\FrontEndEventController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/


require __DIR__ . DIRECTORY_SEPARATOR . 'auth.php';

Route::group([
], function () {

    // Route::get('/', function () {
    //     return view('front-end.home.main');
    // });

    Route::get('single-course',function(){
        return view('front-end.course.single-course');
    });

    Route::get('admin/login',function(){
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
    Route::get('import-courses','importCourseForm')->name('course.importCourseForm');
    Route::post('import','importCourses')->name('course.import');
    Route::post('storeOrUpdate','storeOrUpdate')->name('course.storeOrUpdate');
    Route::get('subCategories','getSubCategories')->name('subCategories');
} );

Route::controller(CategoryController::class)->middleware('auth')->prefix('category')->group( function () {
    Route::get('/','index')->name('category.list');
    Route::get('delete','deleteCategory')->name('category.delete');
    Route::get('create/{id?}','createOrEdit')->name('category.createOrEdit');
    Route::post('storeOrUpdate','storeOrUpdate')->name('category.storeOrUpdate');
} );

Route::controller(SubCategoryController::class)->middleware('auth')->prefix('sub-category')->group( function () {
    Route::get('/','index')->name('sub-category.list');
    Route::get('delete','deleteSubCategory')->name('sub-category.delete');
    Route::get('create/{id?}','createOrEdit')->name('sub-category.createOrEdit');
    Route::post('storeOrUpdate','storeOrUpdate')->name('sub-category.storeOrUpdate');
} );

Route::controller(EventController::class)->middleware('auth')->prefix('event')->group( function () {
    Route::get('/','index')->name('event_list');
    Route::get('create/{id?}','createOrEdit')->name('event.createOrEdit');
    Route::post('storeOrUpdate','storeOrUpdate')->name('event.storeOrUpdate');
    Route::get('delete','deleteEvent')->name('event.delete');
} );

// Frontend Routes
Route::controller(HomeController::class)->group( function () {
    Route::get('/','home')->name('homepage');
    Route::get('subCategories','getSubCategories')->name('categorySubCategories');
} );

Route::controller(FrontEndEventController::class)->group( function () {
    Route::get('event/{id}','singleEvent')->name('event.details');
} );
Route::get('/single-course', function () {
    return view('front-end/course/single-course');
});
