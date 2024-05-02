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
use App\Http\Controllers\Staff\Staff_ActivitiesParticipants_Controller;
use App\Http\Controllers\Staff\Staff_Profile_Controller;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

//Reuse the controller from the controller/AcadHead
use App\Http\Controllers\AcadHead\ViewUserFiles_Controller;
use App\Http\Controllers\AcadHead\DownloadUserFiles_Controller;


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
Route::middleware(['auth', 'isStaff'])->prefix('staff')->name('staff.')->group(function () {

    Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');

    Route::get('class_observation', function () {
        return view('Staff/Staff_ClassObservation', ['page_title' => 'Staff Class Observation']);
        })->name('class_observation');

    Route::get('class_schedule', function () {
        return view('Staff/Staff_ClassSchedule', ['page_title' => 'Staff Class Schedule']);
        })->name('class_schedule');

    Route::get('dashboard',[Staff_Dashboard_Controller::class, 'dashboard'])->name('dashboard');


    // Route::get('/StaffProfile', function () {
    //     return view('Staff/Staff_Profile', ['page_title' => 'Staff Profile']);
    //     })->name('Staff_Profile');

    Route::get('reports', function () {
        return view('Staff/Staff_Reports', ['page_title' => 'Staff Reports']);
        })->name('reports');



        Route::put('update_bincontents/{id}', [Staff_RequirementSetup_Controller::class, 'updateRequirement'])->name('update_requirements');
        Route::delete('delete_bincontents/{id}', [Staff_RequirementSetup_Controller::class, 'deleteRequirement'])->name('delete_requirements');
        Route::delete('destroy_bincontents/{id}', [Staff_RequirementSetup_Controller::class, 'destroyRequirement'])->name('destroy_requirements');
        Route::get('requirementbin_setup', [Staff_RequirementSetup_Controller::class, 'filtered_user'])->name('filtered_users');
        Route::post('restore_requirementbin_contents', [Staff_RequirementSetup_Controller::class, 'restoreRequirement'])->name('restore_requirements');

        Route::get('filtered_and_sorted_assignees/{bin_id}', [Staff_RequirementBin_Controller::class, 'filteredAndSortedAssignees'])->name('filtered_and_sorted_assignees');

        //--------------------------------[ CRUD for REQUIREMENT BIN ]-----------------------------//

        Route::get('requirement_bins',[Staff_RequirementBin_Controller::class, 'show'])->name('requirement_bins.show');
        Route::put('update_requirementbins/{requirementbinId}', [Staff_RequirementBin_Controller::class, 'updateRequirementbins'])->name('update_requirementbins');
        Route::delete('delete_requirementbins/{requirementbinId}', [Staff_RequirementBin_Controller::class, 'deleteRequirementBins'])->name('delete_requirementbins');
        Route::delete('destroy_requirementbins/{id}', [Staff_RequirementBin_Controller::class, 'destroy'])->name('destroy_requirementbins');
        Route::post('create_requirementbin', [Staff_RequirementBin_Controller::class, 'Create_RequirementBin'])->name('requirement_bins.store');
        Route::get('filtered_and_sorted_bin', [Staff_RequirementBin_Controller::class, 'filteredAndSortedBin'])->name('filtered_and_sorted_bins');
        Route::post('restore_RequirementBin', [Staff_RequirementBin_Controller::class, 'restore'])->name('restore_requirementbin');

          //--------------------------------[ CRUD for ACTIVITIES ]-----------------------------//
          Route::post('store_activities', [Staff_Activities_Controller::class, 'Create_Activities'])->name('activities.store');
          Route::put('update_activities/{activitiesId}', [Staff_Activities_Controller::class, 'updateActivities'])->name('update_activities');
          Route::delete('delete_activities/{activitiesId}', [Staff_Activities_Controller::class, 'delete'])->name('delete_activity');
          Route::delete('destroy_activities/{activitiesId}', [Staff_Activities_Controller::class, 'destroy'])->name('destroy_activities');
          Route::get('activities', [Staff_Activities_Controller::class, 'show'])->name('activities.show');
          Route::post('restore_activities', [Staff_Activities_Controller::class, 'restore'])->name('restore_activities');


        //--------------------------------[ CRUD for ACTIVITY PARTICIPANTS ]-----------------------------//
        Route::post('store_participants/{activity_id}', [Staff_ActivitiesParticipants_Controller::class, 'add_participants'])->name('participants.store');
        Route::delete('remove_participants/{id}', [Staff_ActivitiesParticipants_Controller::class, 'destroy'])->name('remove_participants');
          Route::get('activity_participants/{activity_id}', [Staff_ActivitiesParticipants_Controller::class, 'show'])->name('activity_participants.show');



            //--------------------------------[ CRUD for REQUIREMENT BIN SETUP ]-----------------------------//
            Route::get('requirementbin_setup/{id}', [Staff_RequirementSetup_Controller::class, 'show'])->name('requirementbin_setup.show');
            Route::post('setup_requirementbin/{id}', [Staff_RequirementSetup_Controller::class, 'Create_Requirement'])->name('setup_requirementbin.store');


             //--------------------------------[ CRUD for Requirement Assignees ]-----------------------------//

            Route::get('requirement_assignees/{bin_id}', [Staff_RequirementBin_Controller::class, 'view_assigned_user'
            ])->name('requirement_assignees.show');
            Route::get('monitor_requirements.show/{user_id}/{assigned_bin_id}/{req_bin_id}',[Staff_MonitorRequirements_Controller::class, 'show'])
            ->name('monitor_requirements');

            Route::put('approve_bincontents/{requirementId}/{req_bin_id}/{assigned_bin_id}', [Staff_MonitorRequirements_Controller::class, 'approve'])
            ->name('approve_requirements');

            Route::put('reject_bincontents/{requirementId}/{req_bin_id}/{assigned_bin_id}', [Staff_MonitorRequirements_Controller::class, 'reject'])
            ->name('reject_requirements');

            Route::post('assign_requirement/{id}', [Staff_AssignRequirement_Controller::class, 'assign_to_user'])->name('assign_requirement');


            //USER PROFILE
            Route::put('update_my_profile/{profile_id}', [Staff_Profile_Controller::class, 'update'])->name('my_profile.update');
            Route::get('my_profile', [Staff_Profile_Controller::class, 'show'])->name('my_profile.show');


    //------------------------------------------[ ROUTES FOR VIEWING FILES ]-------------------------------------------//

            Route::get('view/files', [ViewUserFiles_Controller::class, 'viewFiles'])->name('files.view');
            Route::get('display/files', [ViewUserFiles_Controller::class, 'displayFiles'])->name('files.display');
            Route::get('download/files/{file}', [DownloadUserFiles_Controller::class, 'downloadFiles'])->name('files.download');

    });

