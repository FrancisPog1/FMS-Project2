<?php

use Illuminate\Support\Facades\Route;

use Carbon\Carbon;
use App\Http\Middleware\AuthCheck;

use App\Http\Controllers\Director\Director_RequirementBin_Controller;
use App\Http\Controllers\Director\Director_Activities_Controller;
use App\Http\Controllers\Director\Director_ActivitiesParticipants_Controller;
use App\Http\Controllers\Director\Director_BinContents_Controller;
use App\Http\Controllers\Director\Director_MonitorRequirements_Controller;
use App\Http\Controllers\Director\Director_DownloadUserFiles_Controller;
use App\Http\Controllers\Director\Director_ViewUserFiles_Controller;
use App\Http\Controllers\Director\Director_Profile_Controller;
use App\Http\Controllers\Director\Director_Dashboard_Controller;
use App\Http\Controllers\Auth\AuthenticatedSessionController;


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

//------------------------------------------------------------------ DIRECTOR --------------------------------------------------------------------//

Route::middleware(['auth', 'isDirector'])->prefix('director')->name('director.')->group(function () {

    Route::get('class_observation', function () {
        return view('Director/Director_ClassObservation', ['page_title' => 'Director Class Observation']);
        })->name('class_observation');

    Route::get('class_schedule', function () {
        return view('Director/Director_ClassSchedule', ['page_title' => 'Director Class Schedule']);
        })->name('class_schedule');

        Route::get('activities', function () {
            return view('Director/Director_Activities', ['page_title' => 'Director Activities']);
            })->name('activities');

        Route::get('activity_types', function () {
            return view('Director/Director_ActivityTypes', ['page_title' => 'Director Class Schedule']);
            })->name('activity_types');

            //----------- DIRECTOR DASHBOARD -----------------//
    Route::get('dashboard', [Director_Dashboard_Controller::class, 'dashboard'])->name('dashboard');


    // Route::get('Profile', function () {
    //     return view('Director/Director_Profile', ['page_title' => 'Director Profile']);
    //     })->name('Profile');

    Route::get('reports', function () {
        return view('Director/Director_Reports', ['page_title' => 'Director Reports']);
        })->name('reports');



    Route::get('requirement_assignees{bin_id}', [Director_RequirementBin_Controller::class, 'view_assigned_user'
    ])->name('requirement_assignees');

    Route::get('activities', [Director_Activities_Controller::class, 'show'])->name('activities');
    Route::get('activity_participants/{activity_id}', [Director_ActivitiesParticipants_Controller::class, 'show'])->name('activities_participants');
    Route::get('requirement_bins', [Director_RequirementBin_Controller::class, 'show'])->name('requirement_bins');

    Route::get('requirementbin_content/{id}', [Director_BinContents_Controller::class, 'show'])->name('requirementbin_content');

    Route::get('monitor_requirements/{user_id}/{assigned_bin_id}/{req_bin_id}',[Director_MonitorRequirements_Controller::class, 'show'])
    ->name('monitor_requirements');

    Route::get('view-files', [Director_ViewUserFiles_Controller::class, 'viewFiles'])->name('files.view');
    Route::get('display-files', [Director_ViewUserFiles_Controller::class, 'displayFiles'])->name('files.display');
    Route::get('download-files/{file}', [Director_DownloadUserFiles_Controller::class, 'downloadFiles'])->name('files.download');


    //USER PROFILE
    Route::put('update_my_profile/{profile_id}', [Director_Profile_Controller::class, 'update'])->name('update_my_profile');
    Route::get('my_profile', [Director_Profile_Controller::class, 'show'])->name('my_profile');


    Route::get('filtered_and_sorted_bin', [Director_RequirementBin_Controller::class, 'filteredAndSortedBin'])->name('filtered_and_sorted_bins');
    Route::get('/filtered_and_sorted_assignees/{bin_id}', [Director_RequirementBin_Controller::class, 'filteredAndSortedAssignees'])->name('filtered_and_sorted_assignees');


    Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');

});


