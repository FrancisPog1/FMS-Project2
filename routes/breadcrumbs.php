<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

/*
 *  FOR ACADEMIC HEAD
 */

// Dashboard
Breadcrumbs::for('Dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('admin.dashboard.show'));
});

// Dashboard > Reqbin
Breadcrumbs::for('Requirement Bin', function (BreadcrumbTrail $trail) {
    $trail->parent('Dashboard');
    $trail->push('Requirement Bin', route('admin.requirement_bins.show'));
});

// Dashboard > Requirement Bin > Bin Setup
Breadcrumbs::for('Requirement Setup', function (BreadcrumbTrail $trail, $bin_id) {
    $trail->parent('Requirement Bin');
    $trail->push('Requirement Setup', route('admin.requirementbin_setup.show', ['id'=>$bin_id]));
});

// Dashboard > Reqbin > Assign Req
Breadcrumbs::for('Requirement Assignees', function (BreadcrumbTrail $trail, $bin_id) {
    $trail->parent('Requirement Bin');
    $trail->push('Requirement Assignees', route('admin.requirement_assignees.show', ['bin_id'=>$bin_id]));
});

// Dashboard > Reqbin > Assign Req
Breadcrumbs::for('Requirement Category', function (BreadcrumbTrail $trail) {
    $trail->parent('Dashboard');
    $trail->push('Requirement Category', route('admin.categories.show'));
});

// Dashboard > Reqbin > Assign Req > Monitor User
Breadcrumbs::for('Monitor User', function (BreadcrumbTrail $trail, $bin_id) {
    $trail->parent('Requirement Assignees', $bin_id);
    $trail->push('Monitor User', route('admin.requirement_assignees.show', ['bin_id'=>$bin_id]));
});

// Dashboard > System user role
Breadcrumbs::for('System user roles', function (BreadcrumbTrail $trail) {
    $trail->parent('Dashboard');
    $trail->push('System user roles', route('admin.roles.show'));
});

// Dashboard > System users
Breadcrumbs::for('System Users', function (BreadcrumbTrail $trail) {
    $trail->parent('Dashboard');
    $trail->push('System Users', route('admin.users.show'));
});

// Dashboard > Academic Rank
Breadcrumbs::for('Faculty Academic Ranks', function (BreadcrumbTrail $trail) {
    $trail->parent('Dashboard');
    $trail->push('Faculty Academic Ranks', route('admin.ranks.show'));
});

// Dashboard > Faculty Type
Breadcrumbs::for('Faculty Types', function (BreadcrumbTrail $trail) {
    $trail->parent('Dashboard');
    $trail->push('Faculty Types', route('admin.faculty_types.show'));
});

// Dashboard > Req Type
Breadcrumbs::for('Requirement Types', function (BreadcrumbTrail $trail) {
    $trail->parent('Dashboard');
    $trail->push('Requirement Types', route('admin.requirement_types.show'));
});

// Dashboard > Act Type
Breadcrumbs::for('Activity Types', function (BreadcrumbTrail $trail) {
    $trail->parent('Dashboard');
    $trail->push('Activity Types', route('admin.activity_types.show'));
});

// Dashboard > Destination
Breadcrumbs::for('Designation', function (BreadcrumbTrail $trail) {
    $trail->parent('Dashboard');
    $trail->push('Designation', route('admin.designations.show'));
});

// Dashboard > Destination
Breadcrumbs::for('Programs', function (BreadcrumbTrail $trail) {
    $trail->parent('Dashboard');
    $trail->push('Programs', route('admin.programs.show'));
});

// Dashboard > Specialization
Breadcrumbs::for('Specialization', function (BreadcrumbTrail $trail) {
    $trail->parent('Dashboard');
    $trail->push('Specialization', route('admin.specializations.show'));
});

// Dashboard > Profile
Breadcrumbs::for('Profile', function (BreadcrumbTrail $trail) {
    $trail->parent('Dashboard');
    $trail->push('Profile', route('admin.user_Profile'));
});

// Dashboard > Report
Breadcrumbs::for('Reports', function (BreadcrumbTrail $trail) {
    $trail->parent('Dashboard');
    $trail->push('Reports', route('admin.reports.show'));
});

