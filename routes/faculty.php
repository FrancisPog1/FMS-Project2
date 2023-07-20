<?php

use Illuminate\Support\Facades\Route;

use Carbon\Carbon;
use App\Http\Middleware\AuthCheck;

// FACULTY CONTROLLERS
use App\Http\Controllers\UploadTemporaryFiles_Controller;
use App\Http\Controllers\DeleteTemporaryFiles_Controller;
use App\Http\Controllers\FacultyUpload_Controller;
use App\Http\Controllers\Faculty\Faculty_RequirementBin_Controller;
use App\Http\Controllers\Faculty\Faculty_Activities_Controller;
use App\Http\Controllers\Faculty\Faculty_Profile_Controller;
use App\Http\Controllers\Faculty\Faculty_Dashboard_Controller;
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


//------------------------------------------------------------------ FACULTIES --------------------------------------------------------------------//
Route::middleware(['auth', 'isFaculty'])->prefix('faculty')->name('faculty.')->group(function () {

    Route::get('activities', [Faculty_Activities_Controller::class, 'show'])->name('activities');
    Route::get('activities/{id}', [Faculty_Activities_Controller::class, 'show_details'])->name('activity_details');

    Route::get('class_observation', function () {
        return view('Faculty/Faculty_ClassObservation', ['page_title' => 'Faculty Class Observation']);
        })->name('class_observation');

    Route::get('class_schedule', function () {
        return view('Faculty/Faculty_ClassSchedule', ['page_title' => 'Faculty Class Schedule']);
        })->name('class_schedule');


        //----------- FACULTY DASHBOARD -----------------//
    Route::get('dashboard', [Faculty_Dashboard_Controller::class, 'dashboard'])->name('dashboard');

    Route::get('reports', function () {
        return view('Faculty/Faculty_Reports', ['page_title' => 'Faculty Reports']);
        })->name('reports');


    //----------- Requirement Bin -----------------//
    Route::get('requirement_bins', [Faculty_RequirementBin_Controller::class, 'show'])->name('requirement_bins.show');
    Route::get('requirements/{assigned_bin_id}/{req_bin_id}', [Faculty_RequirementBin_Controller::class, 'show_requirements'])->name('requirements.show');



    //-------------------- File Pond Routes -----------------//
    // UPLOADING ROUTES
    Route::post('upload-file', [UploadTemporaryFiles_Controller::class, 'uploadFile'])->name('upload_file');
    Route::delete('delete-file', [DeleteTemporaryFiles_Controller::class, 'deleteFile'])->name('delete_file');
    Route::put('submit-uploads/{id}', [FacultyUpload_Controller::class, 'uploadFile'])->name('submit_uploads');


    //USER PROFILE
    Route::put('update_my_profile/{profile_id}', [Faculty_Profile_Controller::class, 'update'])->name('update_my_profile');
    Route::get('my_profile', [Faculty_Profile_Controller::class, 'show'])->name('my_profile');


    Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');

    });

