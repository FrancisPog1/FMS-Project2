<?php

//use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;// the 'DB' class is part of the Illuminate\Support\Facades namespace, and it is commonly used to interact with the database using raw SQL queries.


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
use App\Http\Controllers\AcadHead\Reports_Controller;
use App\Http\Controllers\AcadHead\Profile_Controller;
use App\Http\Controllers\AcadHead\RequirementCategory_Controller;
use App\Http\Controllers\AcadHead\MonitorFaculties_Controller;
use App\Http\Controllers\All_Profile_Controller;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ExportXLS_Controller;
use App\Http\Controllers\Auth\AuthenticatedSessionController;


use Carbon\Carbon;
//use App\Http\Middleware\AuthCheck;



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
Route::middleware(['auth', 'isAdmin'])->prefix('admin')->name('admin.')->group(function () {
     // Define your protected routes here
     //This protects the page by prohibiting the access of user when they are not logged in

    /**Academic Head Dashboard */
    Route::get('dashboard', [Dashboard_Controller::class, 'dashboard'])->name('dashboard.show');

    /**Add User */
    Route::get('users',[User_Controller::class, 'show'])->name('users.show');

    /**Academic Rank */
    Route::get('ranks', [AcademicRank_Controller::class, 'show'])->name('ranks.show');

    /**Role */
    Route::get('roles', [Role_Controller::class, 'show'])->name('roles.show');

    /**Faculty Type */
    Route::get('faculty_types',[FacultyType_Controller::class, 'show'])->name('faculty_types.show');

    /**Designation */
    Route::get('designations', [Designation_Controller::class, 'show'])->name('designations.show');

    /**Specialization */
    Route::get('specializations',[Specialization_Controller::class, 'show'])->name('specializations.show');

    /**Program*/
    Route::get('programs', [Program_Controller::class, 'show'])->name('programs.show');
    Route::get('categories', [RequirementCategory_Controller::class, 'show'])->name('categories.show');


    /**Requirement Bin*/
    Route::get('requirement_bins', [RequirementBin_Controller::class, 'show'])->name('requirement_bins.show');

    //EDITED July 02, 2023
    /**Requirement Type*/
    Route::get('requirement_type',[RequirementType_Controller::class, 'show'])->name('requirement_types.show');

    /**Activity Type*/
    Route::get('activity_type', [ActivityType_Controller::class, 'show'])->name('activity_types.show');

    Route::get('/activity_participants/{activity_id}', [ActivitiesParticipants_Controller::class, 'show'])->name('activities_participants.show');
    Route::get('/monitor_faculties', [MonitorFaculties_Controller::class, 'show'])->name('monitor_faculties.show');

    Route::post('/store_participants/{activity_id}', [ActivitiesParticipants_Controller::class, 'add_participants'])->name('add_participants');

    Route::delete('/remove_participants{id}', [ActivitiesParticipants_Controller::class, 'destroy'])->name('remove_participants');


    /**Class Schedule*/
    Route::get('/class_schedule', function () {
        return view('Academic_head/AcadHead_Setup/AcadHead_ClassSchedule', ['page_title' => 'Class Schedule']);
        })->name('class_schedules.show');


    /**Class Observation*/
    Route::get('/class_observation', function () {
        return view('Academic_head/AcadHead_Setup/AcadHead_ClassObservation', ['page_title' => 'Class Observation']);
        })->name('class_observations.show');

    /**Announcement*/
    Route::get('/announcements', function () {
        return view('Academic_head/AcadHead_Setup/Announcements', ['page_title' => 'Announcements']);
        })->name('announcements.show');

    /**Academic Head Reports*/
    Route::get('/reports', [Reports_Controller::class,'show'])->name('reports.show');
    /**Requirement Assignees*/

    Route::get('/requirement_assignees_reports/{bin_id}', [Reports_Controller::class, 'show_assignees'])->name('requirement_assignees_reports');

    Route::get('/requirementbin_content_reports/{id}', [Reports_Controller::class, 'show_bin_contents'])->name('bin_content_reports');

    Route::get('/activity_participants_reports/{id}', [Reports_Controller::class, 'show_participants'])->name('activity_participants_reports');

    /**Academic Head Activities*/
    Route::get('/activities', [Activities_Controller::class, 'show'])->name('activities.show');


    /**User Profiles*/
    Route::get('/user_profile', [All_Profile_Controller::class,'show'])->name('user_Profile');

    //This is all the routes for Creating or Adding.
    Route::post('/store_ranks', [AcademicRank_Controller::class, 'Create_AcadRank'])->name('ranks.store');
    Route::post('/store_programs', [Program_Controller::class, 'Create_Program'])->name('programs.store');
    Route::post('/store_specializations', [Specialization_Controller::class, 'Create_Specialization'])->name('specializations.store');
    Route::post('/store_designations', [Designation_Controller::class, 'Create_Designation'])->name('designations.store');
    Route::post('/store_faculty_types', [FacultyType_Controller::class, 'Create_FacultyType'])->name('faculty_types.store');
    Route::post('/store_roles', [Role_Controller::class, 'Create_Roles'])->name('roles.store');
    // Route::post('/register_user', [User_Controller::class, 'registerUser'])->name('register_user');
    Route::post('/store__requirementbin', [RequirementBin_Controller::class, 'Create_RequirementBin'])->name('requirement_bins.store');
    Route::post('/store__requirement_types', [RequirementType_Controller::class, 'Create_RequirementType'])->name('requirement_types.store');
    Route::post('/store__activity_types', [ActivityType_Controller::class, 'Create_ActivityType'])->name('activity_types.store');
    Route::post('/store__activities', [Activities_Controller::class, 'Create_Activities'])->name('activities.store');
    Route::post('/store__category', [RequirementCategory_Controller::class, 'store'])->name('category.store');


    //PROFILE SETUP
    Route::put('/update_profile/{eprofile_id}', [Profile_Controller::class, 'update'])->name('update_profile');
    Route::get('/profile/{user_id}', [Profile_Controller::class, 'show'])->name('show_profile');


    //USER PROFILE
    Route::put('/update_my_profile/{profile_id}', [All_Profile_Controller::class, 'update'])->name('update_my_profile');
    Route::get('/my_profile', [All_Profile_Controller::class, 'show'])->name('my_profile.show');

    //New Code
    Route::post('/store_requirementbin_setup{bin_id}', [RequirementSetup_Controller::class, 'Create_Requirement'])->name('requirementbin_setup.store');

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
    Route::delete('/delete_category/{id}', [RequirementCategory_Controller::class, 'deleteCategory'])->name('delete_category');


    //--------------------------HARD DELETE ROUTES---------------------------//
    Route::delete('/destroy_bincontents/{id}', [RequirementSetup_Controller::class, 'destroyRequirement'])->name('destroy_requirements');
    Route::delete('/destroy_requirementtypes/{id}', [RequirementType_Controller::class, 'destroy'])->name('destroy_requirementtypes');
    Route::delete('/destroy_roles/{roleId}', [Role_Controller::class, 'destroy'])->name('destroy_roles');
    Route::delete('/destroy_ranks/{rankId}', [AcademicRank_Controller::class, 'destroy'])->name('destroy_ranks');
    Route::delete('/destroy_users/{userId}', [User_Controller::class, 'destroy'])->name('destroy_users');
    Route::delete('/destroy_designations/{designationId}', [Designation_Controller::class, 'destroy'])->name('destroy_designations');
    Route::delete('/destroy_facultytypes/{facultytypeId}', [FacultyType_Controller::class, 'destroy'])->name('destroy_facultytypes');
    Route::delete('/destroy_programs/{programId}', [Program_Controller::class, 'destroy'])->name('destroy_programs');
    Route::delete('/destroy_specializations/{specializationId}', [Specialization_Controller::class, 'destroy'])->name('destroy_specialization');
    Route::delete('/destroy_requirementbins/{requirementbinId}', [RequirementBin_Controller::class, 'destroy'])->name('destroy_requirementbins');
    Route::delete('/destroy_activitytypes/{activitytypeId}', [ActivityType_Controller::class, 'destroy'])->name('destroy_activitytypes');
    Route::delete('/destroy_activities/{activitiesId}', [Activities_Controller::class, 'destroy'])->name('destroy_activities');
    Route::delete('/destroy_category/{categoryId}', [RequirementCategory_Controller::class, 'destroy'])->name('destroy_category');


    //--------------------------RESTORE DELETED RECORDS ROUTES---------------------------//
    Route::post('/restore_requirementbin_contents', [RequirementSetup_Controller::class, 'restoreRequirement'])->name('restore_requirements');
    Route::post('/restore_requirement_types', [RequirementType_Controller::class, 'restore'])->name('restore_requirementtypes');
    Route::post('/restore_Academic_ranks', [AcademicRank_Controller::class, 'restore'])->name('restore_ranks');
    Route::post('/restore_programs', [Program_Controller::class, 'restore'])->name('restore_program');
    Route::post('/restore_specializations', [Specialization_Controller::class, 'restore'])->name('restore_specialization');
    Route::post('/restore_designations', [Designation_Controller::class, 'restore'])->name('restore_designation');
    Route::post('/restore_faculty_types', [FacultyType_Controller::class, 'restore'])->name('restore_facultyType');
    Route::post('/restore_roles', [Role_Controller::class, 'restore'])->name('restore_roles');
    Route::post('/restore_requirement_bins', [RequirementBin_Controller::class, 'restore'])->name('restore_requirementbin');
    Route::post('/restore_activity_types', [ActivityType_Controller::class, 'restore'])->name('restore_activitytype');
    Route::post('/restore_activities', [Activities_Controller::class, 'restore'])->name('restore_activities');
    Route::post('/restore_users', [User_Controller::class, 'restore'])->name('restore_users');
    Route::post('/restore_category', [RequirementCategory_Controller::class, 'restore'])->name('restore_category');

    //--------------------------UPDATING A RECORD ROUTES---------------------------//
    Route::put('/update_ranks/{id}', [AcademicRank_Controller::class, 'updateRanks'])->name('update_ranks');
    Route::put('/update_roles/{roleId}', [Role_Controller::class, 'updateRoles'])->name('update_roles');
    Route::put('/update_users/{userId}', [User_Controller::class, 'updateUsers'])->name('update_users');
    Route::put('/update_designations/{designationId}', [Designation_Controller::class, 'updateDesignations'])->name('update_designations');
    Route::put('/update_facultytypes/{facultytypeId}', [FacultyType_Controller::class, 'updateFacultytypes'])->name('update_facultytypes');
    Route::put('/update_programs/{programId}', [Program_Controller::class, 'updatePrograms'])->name('update_programs');
    Route::put('/update_specializations/{specializationId}', [Specialization_Controller::class, 'updateSpecializations'])->name('update_specializations');
    Route::put('/update_requirementtypes/{requirementtypeId}', [RequirementType_Controller::class, 'updateRequirementtypes'])->name('update_requirementtypes');
    Route::put('/update_requirementbins/{requirementbinId}', [RequirementBin_Controller::class, 'updateRequirementbins'])->name('update_requirementbins');
    Route::put('/update_activitytypes/{activitytypeId}', [ActivityType_Controller::class, 'updateActivitytypes'])->name('update_activitytypes');
    Route::put('/update_activities/{activitiesId}', [Activities_Controller::class, 'updateActivities'])->name('update_activities');
    Route::put('/update_bincontents/{id}', [RequirementSetup_Controller::class, 'updateRequirement'])->name('update_requirements');
    Route::put('/update_category/{id}', [RequirementCategory_Controller::class, 'update'])->name('update_category');

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
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register_user', [RegisteredUserController::class, 'Create_User'])->name('register_user');



    //Newly Added Routes
    //Requirement Bin Setup Page
    Route::get('/requirementbin_setup/{id}', [RequirementSetup_Controller::class, 'show'])->name('requirementbin_setup.show');


    //Routes for Assigning a requirement to one or more users
    Route::post('/assign_requirement/{id}', [AssignRequirement_Controller::class, 'assign_to_user'])->name('assign_requirement');


    /**Assigned Requirement*/
    Route::get('/assigned_requirement', function () {
        $requirementbins = DB::table('requirement_bins')->get();
        //Format the deadline or date into more readable date format
        foreach ($requirementbins as $requirementbin) {
            $requirementbin->deadline = Carbon::parse($requirementbin->deadline)->format('F d, Y h:i A');
        }
        return view('Academic_head/AcadHead_Setup/AcadHead_AssignedRequirements', compact('requirementbins'));
    })->name('acadhead_AssignedRequirements');

    /**Requirement Assignees*/
    Route::get('/requirement_assignees/{bin_id}', [RequirementBin_Controller::class, 'view_assigned_user'
    ])->name('requirement_assignees.show');

    Route::get('monitor_requirements/{user_id}/{assigned_bin_id}/{req_bin_id}',[MonitorRequirements_Controller::class, 'show'])
    ->name('monitor_requirements.show');


        /**Requirement Validation for AcadHead*/
    Route::put('approve_bincontents/{requirementId}/{req_bin_id}/{assigned_bin_id}', [MonitorRequirements_Controller::class, 'approve'])
    ->name('approve_requirements');

    Route::put('reject_bincontents/{requirementId}/{req_bin_id}/{assigned_bin_id}', [MonitorRequirements_Controller::class, 'reject'])
    ->name('reject_requirements');


    //------------------------------------------[ EXPORT ROUTES ]-------------------------------------------//

    Route::get('/requirementbins/exports/xls',[ExportXLS_Controller::class, 'export_requirementbin_xls'])
    ->name('requirementbins_export');

    Route::get('/requirementbins/exports/pdf',[ExportXLS_Controller::class, 'export_requirementbin_pdf'])
    ->name('requirementbins_export_pdf');


    Route::get('/activities/exports',[ExportXLS_Controller::class, 'export_activities_xls'])
    ->name('activities_export_xls');

    Route::get('/activities/exports/pdf',[ExportXLS_Controller::class, 'export_activities_pdf'])
    ->name('activities_export_pdf');


    Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');

});
