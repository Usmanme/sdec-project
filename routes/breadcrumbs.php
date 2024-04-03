<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->push("Dashboard", route('dashboard'));
});

// Categories
Breadcrumbs::for('categories', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Categories',  route('categories'));
});

Breadcrumbs::for('course.createOrEdit', function (BreadcrumbTrail $trail) {
    // $trail->parent('Course');
    $trail->parent('dashboard');
    $trail->push('Add New Course');
});

Breadcrumbs::for('category.update', function (BreadcrumbTrail $trail) {
    $trail->parent('categories');
    $trail->push('Update Category');
});
