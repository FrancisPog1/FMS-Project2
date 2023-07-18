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
Route::middleware(['auth', 'isDirector'])->group(function () {
    Route::get('/DirectorClassObservation', function () {
        return view('Director/Director_ClassObservation', ['page_title' => 'Director Class Observation']);
        })->name('Director_ClassObservation');

    Route::get('/DirectorClassSchedule', function () {
        return view('Director/Director_ClassSchedule', ['page_title' => 'Director Class Schedule']);
        })->name('Director_ClassSchedule');

        Route::get('/DirectorActivities', function () {
            return view('Director/Director_Activities', ['page_title' => 'Director Activities']);
            })->name('Director_Activities');

        Route::get('/DirectorActivityTypes', function () {
            return view('Director/Director_ActivityTypes', ['page_title' => 'Director Class Schedule']);
            })->name('Director_ActivityTypes');

            //----------- DIRECTOR DASHBOARD -----------------//
    Route::get('/DirectorDashboard', [Director_Dashboard_Controller::class, 'dashboard'])->name('Director_Dashboard');


    // Route::get('/DirectorProfile', function () {
    //     return view('Director/Director_Profile', ['page_title' => 'Director Profile']);
    //     })->name('Director_Profile');

    Route::get('/DirectorReports', function () {
        return view('Director/Director_Reports', ['page_title' => 'Director Reports']);
        })->name('Director_Reports');



    Route::get('/director_requirementAssignees{bin_id}', [Director_RequirementBin_Controller::class, 'view_assigned_user'
    ])->name('director_RequirementAssignees');

    Route::get('/director_activities', [Director_Activities_Controller::class, 'show'])->name('director_activities');
    Route::get('/director_activity_participants/{activity_id}', [Director_ActivitiesParticipants_Controller::class, 'show'])->name('director_activities_participants');
    Route::get('/director_requirementbin', [Director_RequirementBin_Controller::class, 'show'])->name('director_requirementbin');

    Route::get('/director_requirementbin_content{id}', [Director_BinContents_Controller::class, 'show'])->name('director_bin_content');

    Route::get('director_monitor_requirements,{user_id},{assigned_bin_id},{req_bin_id}',[Director_MonitorRequirements_Controller::class, 'show'])
    ->name('director_monitorrequirements');

    Route::get('/director_view/files', [Director_ViewUserFiles_Controller::class, 'viewFiles'])->name('director.files.view');
    Route::get('/director_display/files', [Director_ViewUserFiles_Controller::class, 'displayFiles'])->name('director.files.display');
    Route::get('/director_download/files/{file}', [Director_DownloadUserFiles_Controller::class, 'downloadFiles'])->name('director.files.download');


    Route::get('/director_activity_participants/{activity_id}', [Director_ActivitiesParticipants_Controller::class, 'show'])->name('director_activities_participants');
    Route::get('/director_activities', [Director_Activities_Controller::class, 'show'])->name('director_activities');


    //USER PROFILE
    Route::put('/director_update_my_profile/{profile_id}', [Director_Profile_Controller::class, 'update'])->name('update_director_profile');
    Route::get('/director_my_profile', [Director_Profile_Controller::class, 'show'])->name('director_profile');


});


