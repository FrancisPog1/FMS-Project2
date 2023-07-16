<?php

use Illuminate\Support\Facades\Route;

use Carbon\Carbon;
use App\Http\Middleware\AuthCheck;

use App\Http\Controllers\Staff\Staff_RequirementBin_Controller;
use App\Http\Controllers\Staff\Staff_MonitorRequirements_Controller;
use App\Http\Controllers\Staff\Staff_AssignRequirement_Controller;

use App\Http\Controllers\Staff\Staff_Activities_Controller;
use App\Http\Controllers\Staff\Staff_Dashboard_Controller;

use App\Http\Controllers\Staff\Staff_RequirementSetup_Controller;
use App\Http\Controllers\Staff\Staff_ViewUserFiles_Controller;
use App\Http\Controllers\Staff\Staff_DownloadUserFiles_Controller;
use App\Http\Controllers\Staff\Staff_ActivitiesParticipants_Controller;
use App\Http\Controllers\Staff\Staff_Profile_Controller;


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

//------------------------------------------------------------------ STAFF --------------------------------------------------------------------//
Route::middleware(['auth', 'isStaff'])->group(function () {
    Route::get('/StaffClassObservation', function () {
        return view('Staff/Staff_ClassObservation', ['page_title' => 'Staff Class Observation']);
        })->name('Staff_ClassObservation');

    Route::get('/StaffClassSchedule', function () {
        return view('Staff/Staff_ClassSchedule', ['page_title' => 'Staff Class Schedule']);
        })->name('Staff_ClassSchedule');

    Route::get('/StaffDashboard',[Staff_Dashboard_Controller::class, 'dashboard'])->name('Staff_Dashboard');







    // Route::get('/StaffProfile', function () {
    //     return view('Staff/Staff_Profile', ['page_title' => 'Staff Profile']);
    //     })->name('Staff_Profile');

    Route::get('/StaffReports', function () {
        return view('Staff/Staff_Reports', ['page_title' => 'Staff Reports']);
        })->name('Staff_Reports');



        Route::put('/staff_update_bincontents{id}', [Staff_RequirementSetup_Controller::class, 'updateRequirement'])->name('staff_update_requirements');
        Route::delete('/staff_delete_bincontents/{id}', [Staff_RequirementSetup_Controller::class, 'deleteRequirement'])->name('staff_delete_requirements');
        Route::delete('/staff_destroy_bincontents{id}', [Staff_RequirementSetup_Controller::class, 'destroyRequirement'])->name('staff_destroy_requirements');
        Route::get('/staff_requirementbin_setup_page', [Staff_RequirementSetup_Controller::class, 'filtered_user'])->name('staff_filtered_users');
        Route::post('/staff_restore_bincontents', [Staff_RequirementSetup_Controller::class, 'restoreRequirement'])->name('staff_restore_requirements');

        Route::get('/staff_filtered_and_sorted_assignees/{bin_id}', [Staff_RequirementBin_Controller::class, 'filteredAndSortedAssignees'])->name('staff_filtered_and_sorted_assignees');

        //--------------------------------[ CRUD for REQUIREMENT BIN ]-----------------------------//

        Route::get('/StaffRequirementBin',[Staff_RequirementBin_Controller::class, 'show'])->name('staff_RequirementBin');
        Route::put('/staff_update_requirementbins{requirementbinId}', [Staff_RequirementBin_Controller::class, 'updateRequirementbins'])->name('staff_update_requirementbins');
        Route::delete('/staff_delete_requirementbins/{requirementbinId}', [Staff_RequirementBin_Controller::class, 'deleteRequirementBins'])->name('staff_delete_requirementbins');
        Route::delete('/staff_destroy_requirementbins{requirementbinId}', [Staff_RequirementBin_Controller::class, 'destroy'])->name('staff_destroy_requirementbins');
        Route::post('/staff_create_requirementbin', [Staff_RequirementBin_Controller::class, 'Create_RequirementBin'])->name('staff_create_requirementbins');
        Route::get('/staff_filtered_and_sorted_bin', [Staff_RequirementBin_Controller::class, 'filteredAndSortedBin'])->name('staff_filtered_and_sorted_bins');
        Route::post('/staff_restore_RequirementBin', [Staff_RequirementBin_Controller::class, 'restore'])->name('staff_restore_requirementbin');

          //--------------------------------[ CRUD for ACTIVITIES ]-----------------------------//
          Route::post('/staff_create_activities', [Staff_Activities_Controller::class, 'Create_Activities'])->name('staff_create_activities');
          Route::put('/staff_update_activities{activitiesId}', [Staff_Activities_Controller::class, 'updateActivities'])->name('staff_update_activities');
          Route::delete('/staff_delete_activities/{activitiesId}', [Staff_Activities_Controller::class, 'delete'])->name('staff_delete_activity');
          Route::delete('/staff_destroy_activities{activitiesId}', [Staff_Activities_Controller::class, 'destroy'])->name('staff_destroy_activities');
          Route::get('/staff_activities', [Staff_Activities_Controller::class, 'show'])->name('staff_activities');
          Route::post('/staff_restore_activities', [Staff_Activities_Controller::class, 'restore'])->name('staff_restore_activities');


        //--------------------------------[ CRUD for ACTIVITY PARTICIPANTS ]-----------------------------//

          Route::get('/staff_activity_participants/{activity_id}', [Staff_ActivitiesParticipants_Controller::class, 'show'])->name('staff_activities_participants');
          Route::post('/staff_add_participants/{activity_id}', [Staff_ActivitiesParticipants_Controller::class, 'add_participants'])->name('staff_add_participants');
          Route::delete('/staff_ remove_participants{id}', [Staff_ActivitiesParticipants_Controller::class, 'destroy'])->name('staff_remove_participants');


            //--------------------------------[ CRUD for REQUIREMENT BIN SETUP ]-----------------------------//
            Route::get('/staff_requirementbin_setup_page{id}', [Staff_RequirementSetup_Controller::class, 'show'])->name('staff_bin_setup');
            Route::post('/staff_setup_requirementbin/{id}', [Staff_RequirementSetup_Controller::class, 'Create_Requirement'])->name('staff_setup_requirementbin');


             //--------------------------------[ CRUD for Requirement Assignees ]-----------------------------//

            Route::get('/staff_RequirementAssignees{bin_id}', [Staff_RequirementBin_Controller::class, 'view_assigned_user'
            ])->name('staff_RequirementAssignees');
            Route::get('staff_MonitorRequirements,{user_id},{assigned_bin_id},{req_bin_id}',[Staff_MonitorRequirements_Controller::class, 'show'])
            ->name('staff_MonitorRequirements');
            Route::put('staff/ReviewedBin/{assigned_bin_id}/{req_bin_id}',[Staff_MonitorRequirements_Controller::class, 'reviewedMark'])
            ->name('staff_ReviewRequirements');

            Route::put('/staff_validate_bincontents/{requirementId}/{req_bin_id}/{assigned_bin_id}', [Staff_MonitorRequirements_Controller::class, 'validateRequirement'])
            ->name('staff_validate_requirements');

            Route::post('/staff-assign-Requirement{id}', [Staff_AssignRequirement_Controller::class, 'assign_to_user'])->name('staff_assign_requirement');



            Route::post('/restore_bincontents', [RequirementSetup_Controller::class, 'restoreRequirement'])->name('restore_requirements');
            Route::post('/restore_Activities', [Activities_Controller::class, 'restore'])->name('restore_activities');


            //USER PROFILE
            Route::put('/staff_update_my_profile/{profile_id}', [Staff_Profile_Controller::class, 'update'])->name('update_staff_profile');
            Route::get('/staff_my_profile', [Staff_Profile_Controller::class, 'show'])->name('staff_profile');


    });


