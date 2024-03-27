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

Breadcrumbs::for('category.createOrEdit', function (BreadcrumbTrail $trail) {
    $trail->parent('categories');
    $trail->push('Add New Category');
});

Breadcrumbs::for('category.update', function (BreadcrumbTrail $trail) {
    $trail->parent('categories');
    $trail->push('Update Category');
});
