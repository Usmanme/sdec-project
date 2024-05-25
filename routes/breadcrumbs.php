<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->push("Dashboard", route('dashboard'));
});

// Courses
Breadcrumbs::for('courses', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Course List',  route('course.list'));
});

Breadcrumbs::for('course.createOrEdit', function (BreadcrumbTrail $trail) {
    $trail->parent('courses');
    $trail->push('Add New Course');
});

Breadcrumbs::for('course.storeOrUpdate', function (BreadcrumbTrail $trail) {
    $trail->parent('courses');
    $trail->push('Update Course');
});

Breadcrumbs::for('course.importCourseForm', function (BreadcrumbTrail $trail) {
    $trail->parent('courses');
    $trail->push('Import Courses');
});

// Categories
Breadcrumbs::for('category', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Category List',  route('category.list'));
});

Breadcrumbs::for('category.createOrEdit', function (BreadcrumbTrail $trail) {
    $trail->parent('category');
    $trail->push('Add New Category');
});

Breadcrumbs::for('category.storeOrUpdate', function (BreadcrumbTrail $trail) {
    $trail->parent('category');
    $trail->push('Update Category');
});
Breadcrumbs::for('category.importCategoryForm', function (BreadcrumbTrail $trail) {
    $trail->parent('category');
    $trail->push('Import Category');
});
// Sub Categories
Breadcrumbs::for('subCategory', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Sub Category List',  route('sub-category.list'));
});

Breadcrumbs::for('subCategory.createOrEdit', function (BreadcrumbTrail $trail) {
    $trail->parent('subCategory');
    $trail->push('Add New Sub Category');
});

Breadcrumbs::for('subCategory.storeOrUpdate', function (BreadcrumbTrail $trail) {
    $trail->parent('subCategory');
    $trail->push('Update Sub Category');
});
Breadcrumbs::for('sub-category.importSubCategoryForm', function (BreadcrumbTrail $trail) {
    $trail->parent('subCategory');
    $trail->push('Import Sub Category');
});

// Events
Breadcrumbs::for('events', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Events List',  route('event_list'));
});

Breadcrumbs::for('event.createOrEdit', function (BreadcrumbTrail $trail) {
    $trail->parent('events');
    $trail->push('Add New Event');
});

Breadcrumbs::for('event.storeOrUpdate', function (BreadcrumbTrail $trail) {
    $trail->parent('events');
    $trail->push('Update Event');
});
