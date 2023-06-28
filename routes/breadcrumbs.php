<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('Dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('acadhead_Dashboard'));
});

// Home > Blog
Breadcrumbs::for('Requirement Bin', function (BreadcrumbTrail $trail) {
    $trail->parent('Dashboard');
    $trail->push('Requirement Bin', route('acadhead_RequirementBin'));
});

// Home > Blog2
Breadcrumbs::for('Assigned Requirement', function (BreadcrumbTrail $trail) {
    $trail->parent('Requirement Bin');
    $trail->push('Assigned Requirement', route('acadhead_AssignedRequirements'));
});

// Home > Blog > [Category]
// Breadcrumbs::for('category', function (BreadcrumbTrail $trail, $category) {
//     $trail->parent('blog');
//     $trail->push($category->title, route('category', $category));
// });

//  // Home > Blog > Blog2 > [Category]
// Breadcrumbs::for('category', function (BreadcrumbTrail $trail, $category) {
//     $trail->parent('blog');
//     $trail->push($category->title, route('category', $category));
// });

// // Home > Blog > [Category] > [Post]
// Breadcrumbs::for('post,' function ($trail, $post) {
// 	$trail->parent('category', $post-.caategory);
// 	$trail->push($post->title, route('post', $post->id));

// });
