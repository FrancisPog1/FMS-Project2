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
    $trail->push('Dashboard', route('acadhead_Dashboard'));
});

// Dashboard > Reqbin
Breadcrumbs::for('Requirement Bin', function (BreadcrumbTrail $trail) {
    $trail->parent('Dashboard');
    $trail->push('Requirement Bin', route('acadhead_RequirementBin'));
});

// Dashboard > Reqbin > Assign Req
Breadcrumbs::for('Assigned Requirement', function (BreadcrumbTrail $trail) {
    $trail->parent('Requirement Bin');
    $trail->push('Assigned Requirement', route('acadhead_AssignedRequirements'));
});



// Dashboard > Reqbin > Assign Req > Evaluation
Breadcrumbs::for('Evaluation', function (BreadcrumbTrail $trail, $bin_id) {
    $trail->parent('Assigned Requirement');
    $trail->push('Evaluation', route('acadhead_RequirementAssignees', ['bin_id'=>$bin_id]));
});

// Dashboard > Reqbin > Assign Req > Evaluation > Monitor


// Breadcrumbs::for('Monitor User', function (BreadcrumbTrail $trail, $user_id, $reqbin_id, $ass_bin_id) {
//     $trail->parent('Evaluation', $user_id, $reqbin_id, $ass_bin_id);
//     $trail->push('Monitor User', route('acadhead_MonitorRequirements', [
//         'user_id' => $user_id,
//         'assigned_bin_id' => $ass_bin_id,
//         'req_bin_id' => $reqbin_id
//     ]));
// });

Breadcrumbs::for('Monitor User', function (BreadcrumbTrail $trail, $bin_id) {
    $trail->parent('Evaluation', $bin_id);
    $trail->push('Monitor User', route('acadhead_RequirementAssignees', ['bin_id'=>$bin_id]));
});

// Dashboard > System user role
Breadcrumbs::for('System user roles', function (BreadcrumbTrail $trail) {
    $trail->parent('Dashboard');
    $trail->push('System user roles', route('acadhead_UserRole'));
});

// Dashboard > System users
Breadcrumbs::for('System Users', function (BreadcrumbTrail $trail) {
    $trail->parent('Dashboard');
    $trail->push('System Users', route('acadhead_AddUser'));
});

// Dashboard > Academic Rank
Breadcrumbs::for('Faculty Academic Ranks', function (BreadcrumbTrail $trail) {
    $trail->parent('Dashboard');
    $trail->push('Faculty Academic Ranks', route('acadhead_AcademicRank'));
});

// Dashboard > Faculty Type
Breadcrumbs::for('Faculty Types', function (BreadcrumbTrail $trail) {
    $trail->parent('Dashboard');
    $trail->push('Faculty Types', route('acadhead_FacultyType'));
});

// Dashboard > Req Type
Breadcrumbs::for('Requirement Types', function (BreadcrumbTrail $trail) {
    $trail->parent('Dashboard');
    $trail->push('Requirement Types', route('acadhead_RequirementType'));
});

// Dashboard > Act Type
Breadcrumbs::for('Activity Types', function (BreadcrumbTrail $trail) {
    $trail->parent('Dashboard');
    $trail->push('Activity Types', route('acadhead_ActivityType'));
});

// Dashboard > Destination
Breadcrumbs::for('Designation', function (BreadcrumbTrail $trail) {
    $trail->parent('Dashboard');
    $trail->push('Designation', route('acadhead_Designation'));
});

// Dashboard > Destination
Breadcrumbs::for('Programs', function (BreadcrumbTrail $trail) {
    $trail->parent('Dashboard');
    $trail->push('Programs', route('acadhead_Program'));
});

// Dashboard > Specialization
Breadcrumbs::for('Specialization', function (BreadcrumbTrail $trail) {
    $trail->parent('Dashboard');
    $trail->push('Specialization', route('acadhead_Specialization'));
});
