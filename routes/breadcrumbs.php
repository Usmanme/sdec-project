<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->push("Dashboard", route('dashboard'));
});

// Categories
Breadcrumbs::for('courses', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Course List',  route('course.list'));
});

Breadcrumbs::for('course.createOrEdit', function (BreadcrumbTrail $trail) {
    // $trail->parent('Course');
    $trail->parent('dashboard');
    $trail->push('Add New Course');
});

Breadcrumbs::for('course.storeOrUpdate', function (BreadcrumbTrail $trail) {
    $trail->parent('courses');
    $trail->push('Update Course');
});
