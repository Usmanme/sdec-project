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
    $trail->push('Add New category');
});

Breadcrumbs::for('category.storeOrUpdate', function (BreadcrumbTrail $trail) {
    $trail->parent('category');
    $trail->push('Update Category');
});
