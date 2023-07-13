<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AcadHead\AcademicRank_Controller;
use App\Http\Controllers\AcadHead\Specialization_Controller;
use App\Http\Controllers\AcadHead\Designation_Controller;
use App\Http\Controllers\AcadHead\FacultyType_Controller;
use App\Http\Controllers\AcadHead\Program_Controller;
use App\Http\Controllers\AcadHead\Role_Controller;
use App\Http\Controllers\AcadHead\RequirementBin_Controller;
use App\Http\Controllers\AcadHead\RequirementType_Controller;
use App\Http\Controllers\AcadHead\ActivityType_Controller;
use App\Http\Controllers\AcadHead\Activities_Controller;
use App\Http\Controllers\AcadHead\User_Controller;   // For update and delete
use App\Http\Controllers\AcadHead\RequirementSetup_Controller;
use App\Http\Controllers\AcadHead\AssignRequirement_Controller;
use App\Http\Controllers\AcadHead\MonitorRequirements_Controller;
use App\Http\Controllers\AcadHead\Dashboard_Controller;
use App\Http\Controllers\AcadHead\ViewUserFiles_Controller;
use App\Http\Controllers\AcadHead\DownloadUserFiles_Controller;
use App\Http\Controllers\AcadHead\ActivitiesParticipants_Controller;
use App\Http\Controllers\Auth\RegisteredUserController;


use Carbon\Carbon;
use App\Http\Middleware\AuthCheck;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// This is like an extend/include function. It includes the auth.php, faculty.php,
// director.php, and staff.php route in this web.php route so that It can access the routes inside the auth.php
require __DIR__.'/auth.php';

require __DIR__.'/faculty.php';

require __DIR__.'/director.php';

require __DIR__.'/staff.php';


//------------------------------------------------------------------ ACADEMIC HEAD --------------------------------------------------------------------//
// Route::middleware(['auth','isAdmin'])->group(function () {
Route::middleware(['auth','isAdmin'])->group(function () {
     // Define your protected routes here
     //This protects the page by prohibiting the access of user when they are not logged in

    /**Academic Head Dashboard */
    Route::get('/AcadHead_Dashboard', function () {
        return view('Academic_head/INTG_AcadHead_Dashboard', ['page_title' => 'Dashboard']);
        })->name('acadhead_Dashboard');

    /**Add User */
    Route::get('/AddUser',[User_Controller::class, 'show'])->name('acadhead_AddUser');

    /**Academic Rank */
    Route::get('/AcadHead', [AcademicRank_Controller::class, 'show'])->name('acadhead_AcademicRank');

    /**Role */
    Route::get('/Role', [Role_Controller::class, 'show'])->name('acadhead_UserRole');

    /**Faculty Type */
    Route::get('/FacultyType',[FacultyType_Controller::class, 'show'])->name('acadhead_FacultyType');

    /**Designation */
    Route::get('/Designation', [Designation_Controller::class, 'show'])->name('acadhead_Designation');

    /**Specialization */
    Route::get('/Specialization',[Specialization_Controller::class, 'show'])->name('acadhead_Specialization');

    /**Program*/
    Route::get('/Program', [Program_Controller::class, 'show'])->name('acadhead_Program');



    /**Requirement Bin*/
    Route::get('/RequirementBin', [RequirementBin_Controller::class, 'show'])->name('acadhead_RequirementBin');

    //EDITED July 02, 2023
    /**Requirement Type*/
    Route::get('/RequirementType',[RequirementType_Controller::class, 'show'])->name('acadhead_RequirementType');

    /**Activity Type*/
    Route::get('/ActivityType', [ActivityType_Controller::class, 'show'])->name('acadhead_ActivityType');

    Route::get('/ActivityParticipants/{activity_id}', [ActivitiesParticipants_Controller::class, 'show'])->name('activities_participants');

    Route::post('/AddParticipants/{activity_id}', [ActivitiesParticipants_Controller::class, 'add_participants'])->name('add_participants');

    Route::delete('/RemoveParticipants{id}', [ActivitiesParticipants_Controller::class, 'destroy'])->name('remove_participants');


    /**Class Schedule*/
    Route::get('/ClassSchedule', function () {
        return view('Academic_head/AcadHead_Setup/AcadHead_ClassSchedule', ['page_title' => 'Class Schedule']);
        })->name('acadhead_ClassSchedule');


    /**Class Observation*/
    Route::get('/ClassObservation', function () {
        return view('Academic_head/AcadHead_Setup/AcadHead_ClassObservation', ['page_title' => 'Class Observation']);
        })->name('acadhead_ClassObservation');


    /**Academic Head Reports*/
    Route::get('/Reports', function () {
        return view('Academic_head/AcadHead_Setup/AcadHead_Reports', ['page_title' => 'Reports']);
        })->name('acadhead_Reports');


    /**Academic Head Activities*/
    Route::get('/AcadHead_Activities', [Activities_Controller::class, 'show'])->name('acadhead_activities');


    /**User Profiles*/
    Route::get('/UserProfile', function () {
        return view('/User_Profile', ['page_title' => 'User Profile']);
        })->name('user_Profile');


    //This is all the routes for Creating or Adding.
    Route::post('/Create_AcademicRank', [AcademicRank_Controller::class, 'Create_AcadRank'])->name('Create_AcademicRank');
    Route::post('/CreateProgram', [Program_Controller::class, 'Create_Program'])->name('CreateProgram');
    Route::post('/CreateSpecialization', [Specialization_Controller::class, 'Create_Specialization'])->name('CreateSpecialization');
    Route::post('/CreateDesignation', [Designation_Controller::class, 'Create_Designation'])->name('CreateDesignation');
    Route::post('/CreateFacultyType', [FacultyType_Controller::class, 'Create_FacultyType'])->name('CreateFacultyType');
    Route::post('/CreateRole', [Role_Controller::class, 'Create_Roles'])->name('CreateRole');
    // Route::post('/register_user', [User_Controller::class, 'registerUser'])->name('register_user');
    Route::post('/Create_RequirementBin', [RequirementBin_Controller::class, 'Create_RequirementBin'])->name('Create_RequirementBin');
    Route::post('/Create_RequirementType', [RequirementType_Controller::class, 'Create_RequirementType'])->name('Create_RequirementType');
    Route::post('/Create_ActivityType', [ActivityType_Controller::class, 'Create_ActivityType'])->name('Create_ActivityType');
    Route::post('/Create_Activities', [Activities_Controller::class, 'Create_Activities'])->name('Create_Activities');


    //New Code
    Route::post('/Setup_RequirementBin/{id}', [RequirementSetup_Controller::class, 'Create_Requirement'])->name('Setup_RequirementBin');

    //--------------------------SOFT DELETING RECORDS ROUTES---------------------------//
    Route::delete('/delete_roles/{roleId}', [Role_Controller::class, 'deleteRoles'])->name('delete_roles');
    Route::delete('/delete_ranks/{rankId}', [AcademicRank_Controller::class, 'deleteRanks'])->name('delete_ranks');
    Route::delete('/delete_users/{userId}', [User_Controller::class, 'deleteUsers'])->name('delete_users');
    Route::delete('/delete_designations/{designationId}', [Designation_Controller::class, 'deleteDesignations'])->name('delete_designations');
    Route::delete('/delete_facultytypes/{facultytypeId}', [FacultyType_Controller::class, 'deleteFacultytypes'])->name('delete_facultytypes');
    Route::delete('/delete_programs/{programId}', [Program_Controller::class, 'deletePrograms'])->name('delete_programs');
    Route::delete('/delete_specializations/{specializationId}', [Specialization_Controller::class, 'deleteSpecializations'])->name('delete_specializations');
    Route::delete('/delete_requirementtypes/{requirementtypeId}', [RequirementType_Controller::class, 'deleteRequirementtypes'])->name('delete_requirementtypes');
    Route::delete('/delete_requirementbins/{requirementbinId}', [RequirementBin_Controller::class, 'deleteRequirementBins'])->name('delete_requirementbins');
    Route::delete('/delete_activitytypes/{activitytypeId}', [ActivityType_Controller::class, 'deleteActivitytypes'])->name('delete_activitytypes');
    Route::delete('/delete_activities/{activitiesId}', [Activities_Controller::class, 'delete'])->name('delete_activity');
    Route::delete('/delete_bincontents/{id}', [RequirementSetup_Controller::class, 'deleteRequirement'])->name('delete_requirements');

    //--------------------------HARD DELETE ROUTES---------------------------//
    Route::delete('/destroy_bincontents{id}', [RequirementSetup_Controller::class, 'destroyRequirement'])->name('destroy_requirements');
    Route::delete('/destroy_requirementtypes{id}', [RequirementType_Controller::class, 'destroy'])->name('destroy_requirementtypes');
    Route::delete('/destroy_roles{roleId}', [Role_Controller::class, 'destroy'])->name('destroy_roles');
    Route::delete('/destroy_ranks{rankId}', [AcademicRank_Controller::class, 'destroy'])->name('destroy_ranks');
    Route::delete('/destroy_users{userId}', [User_Controller::class, 'destroy'])->name('destroy_users');
    Route::delete('/destroy_designations{designationId}', [Designation_Controller::class, 'destroy'])->name('destroy_designations');
    Route::delete('/destroy_facultytypes{facultytypeId}', [FacultyType_Controller::class, 'destroy'])->name('destroy_facultytypes');
    Route::delete('/destroy_programs{programId}', [Program_Controller::class, 'destroy'])->name('destroy_programs');
    Route::delete('/destroy_specializations{specializationId}', [Specialization_Controller::class, 'destroy'])->name('destroy_specialization');
    Route::delete('/destroy_requirementbins{requirementbinId}', [RequirementBin_Controller::class, 'destroy'])->name('destroy_requirementbins');
    Route::delete('/destroy_activitytypes{activitytypeId}', [ActivityType_Controller::class, 'destroy'])->name('destroy_activitytypes');
    Route::delete('/destroy_activities{activitiesId}', [Activities_Controller::class, 'destroy'])->name('destroy_activities');


    //--------------------------RESTORE DELETED RECORDS ROUTES---------------------------//
    Route::post('/restore_bincontents', [RequirementSetup_Controller::class, 'restoreRequirement'])->name('restore_requirements');
    Route::post('/restore_requirementtypes', [RequirementType_Controller::class, 'restore'])->name('restore_requirementtypes');
    Route::post('/restore_AcademicRank', [AcademicRank_Controller::class, 'restore'])->name('restore_ranks');
    Route::post('/restore_Program', [Program_Controller::class, 'restore'])->name('restore_program');
    Route::post('/restore_Specialization', [Specialization_Controller::class, 'restore'])->name('restore_specialization');
    Route::post('/restore_Designation', [Designation_Controller::class, 'restore'])->name('restore_designation');
    Route::post('/restore_FacultyType', [FacultyType_Controller::class, 'restore'])->name('restore_facultyType');
    Route::post('/restore_Role', [Role_Controller::class, 'restore'])->name('restore_roles');
    Route::post('/restore_RequirementBin', [RequirementBin_Controller::class, 'restore'])->name('restore_requirementbin');
    Route::post('/restore_ActivityType', [ActivityType_Controller::class, 'restore'])->name('restore_activitytype');
    Route::post('/restore_Activities', [Activities_Controller::class, 'restore'])->name('restore_activities');

    //--------------------------UPDATING A RECORD ROUTES---------------------------//
    Route::put('/update_ranks{id}', [AcademicRank_Controller::class, 'updateRanks'])->name('update_ranks');
    Route::put('/update_roles{roleId}', [Role_Controller::class, 'updateRoles'])->name('update_roles');
    Route::put('/update_users{userId}', [User_Controller::class, 'updateUsers'])->name('update_users');
    Route::put('/update_designations{designationId}', [Designation_Controller::class, 'updateDesignations'])->name('update_designations');
    Route::put('/update_facultytypes{facultytypeId}', [FacultyType_Controller::class, 'updateFacultytypes'])->name('update_facultytypes');
    Route::put('/update_programs{programId}', [Program_Controller::class, 'updatePrograms'])->name('update_programs');
    Route::put('/update_specializations{specializationId}', [Specialization_Controller::class, 'updateSpecializations'])->name('update_specializations');
    Route::put('/update_requirementtypes{requirementtypeId}', [RequirementType_Controller::class, 'updateRequirementtypes'])->name('update_requirementtypes');
    Route::put('/update_requirementbins{requirementbinId}', [RequirementBin_Controller::class, 'updateRequirementbins'])->name('update_requirementbins');
    Route::put('/update_activitytypes{activitytypeId}', [ActivityType_Controller::class, 'updateActivitytypes'])->name('update_activitytypes');
    Route::put('/update_activities{activitiesId}', [Activities_Controller::class, 'updateActivities'])->name('update_activities');
    Route::put('/update_bincontents{id}', [RequirementSetup_Controller::class, 'updateRequirement'])->name('update_requirements');

    //--------------------------FILTERING ROUTES---------------------------//
    Route::get('/requirementbin_setup_page', [RequirementSetup_Controller::class, 'filtered_user'])->name('filtered_users');

    //--------------------------FILTERTING/SORTING ROUTES---------------------------//

    Route::get('/filtered_and_sorted_assignees/{bin_id}', [RequirementBin_Controller::class, 'filteredAndSortedAssignees'])->name('filtered_and_sorted_assignees');
    Route::get('/filtered_and_sorted_bin', [RequirementBin_Controller::class, 'filteredAndSortedBin'])->name('filtered_and_sorted_bins');
    Route::get('/filtered_and_sorted_activitytype', [ActivityType_Controller::class, 'filteredAndSortedActivitytype'])->name('filtered_and_sorted_activitytypes');
    Route::get('/filtered_and_sorted_user', [User_Controller::class, 'filteredAndSortedUser'])->name('filtered_and_sorted_users');


    Route::get('/filtered_and_sorted_role', [Role_Controller::class, 'filteredAndSortedRole'])->name('sorted_roles');
    Route::get('/filtered_and_sorted_rank', [AcademicRank_Controller::class, 'filteredAndSortedRank'])->name('sorted_ranks');
    Route::get('/filtered_and_sorted_facultytype', [FacultyType_Controller::class, 'filteredAndSortedFacultytype'])->name('sorted_facultytypes');
    Route::get('/filtered_and_sorted_requirementtype', [RequirementType_Controller::class, 'filteredAndSortedRequirementtype'])->name('sorted_requirementtypes');
    Route::get('/filtered_and_sorted_designation', [Designation_Controller::class, 'filteredAndSortedDesignation'])->name('sorted_designations');
    Route::get('/filtered_and_sorted_program', [Program_Controller::class, 'filteredAndSortedProgram'])->name('sorted_programs');
    Route::get('/filtered_and_sorted_specialization', [Specialization_Controller::class, 'filteredAndSortedSpecialization'])->name('sorted_specializations');


    //------------------------------------------[ ROUTES FOR VIEWING FILES ]-------------------------------------------//

    Route::get('/view/files', [ViewUserFiles_Controller::class, 'viewFiles'])->name('files.view');
    Route::get('/display/files', [ViewUserFiles_Controller::class, 'displayFiles'])->name('files.display');
    Route::get('/download/files/{file}', [DownloadUserFiles_Controller::class, 'downloadFiles'])->name('files.download');




    Route::put('/validate_bincontents/{requirementId}/{req_bin_id}/{assigned_bin_id}', [MonitorRequirements_Controller::class, 'validateRequirement'])->name('validate_requirements');


    // For registering users
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register_user', [RegisteredUserController::class, 'Create_User'])->name('register_user');



    //Newly Added Routes
    //Requirement Bin Setup Page
   Route::get('/requirementbin_setup_page{id}', [RequirementSetup_Controller::class, 'show'])->name('acadhead_bin_setup');


    //Routes for Assigning a requirement to one or more users
    Route::post('/assign-Requirement{id}', [AssignRequirement_Controller::class, 'assign_to_user'])->name('Assign_Requirement');


    /**Assigned Requirement*/
    Route::get('/AssignedRequirement', function () {
        $requirementbins = DB::table('requirement_bins')->get();
        //Format the deadline or date into more readable date format
        foreach ($requirementbins as $requirementbin) {
            $requirementbin->deadline = Carbon::parse($requirementbin->deadline)->format('F d, Y h:i A');
        }
        return view('Academic_head/AcadHead_Setup/AcadHead_AssignedRequirements', compact('requirementbins'));
    })->name('acadhead_AssignedRequirements');

    /**Requirement Assignees*/
    Route::get('/RequirementAssignees{bin_id}', [RequirementBin_Controller::class, 'view_assigned_user'
    ])->name('acadhead_RequirementAssignees');
    Route::get('MonitorRequirements,{user_id},{assigned_bin_id},{req_bin_id}',[MonitorRequirements_Controller::class, 'show'])
    ->name('acadhead_MonitorRequirements');
    Route::put('/ReviewedBin/{assigned_bin_id}/{req_bin_id}',[MonitorRequirements_Controller::class, 'reviewedMark'])
    ->name('acadhead_ReviewRequirements');


});
