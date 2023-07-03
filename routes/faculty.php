<?php

use Illuminate\Support\Facades\Route;

use Carbon\Carbon;
use App\Http\Middleware\AuthCheck;

// FACULTY CONTROLLERS
use App\Http\Controllers\UploadTemporaryFiles_Controller;
use App\Http\Controllers\DeleteTemporaryFiles_Controller;
use App\Http\Controllers\FacultyUpload_Controller;
use App\Http\Controllers\Faculty\Faculty_RequirementBin_Controller;

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
Route::middleware(['auth', 'isFaculty'])->group(function () {

    Route::get('/FacultyActivities', function () {
        return view('Faculty/Faculty_Activities', ['page_title' => 'Faculty Activities']);
        })->name('faculty_Activities');

    Route::get('/FacultyClassObservation', function () {
        return view('Faculty/Faculty_ClassObservation', ['page_title' => 'Faculty Class Observation']);
        })->name('faculty_ClassObservation');

    Route::get('/FacultyClassSchedule', function () {
        return view('Faculty/Faculty_ClassSchedule', ['page_title' => 'Faculty Class Schedule']);
        })->name('faculty_ClassSchedule');

    Route::get('/FacultyDashboard', function () {
        return view('Faculty/Faculty_Dashboard', ['page_title' => 'Faculty Dashboard']);
        })->name('faculty_Dashboard');

    Route::get('/FacultyProfile', function () {
        return view('Faculty/Faculty_Profile', ['page_title' => 'Faculty Profile']);
        })->name('faculty_Profile');

    Route::get('/FacultyReports', function () {
        return view('Faculty/Faculty_Reports', ['page_title' => 'Faculty Reports']);
        })->name('faculty_Reports');


    //----------- Requirement Bin -----------------//
    Route::get('/FacultyRequirementBin', [Faculty_RequirementBin_Controller::class, 'show'])->name('faculty_RequirementBin');
    Route::get('/FacultyRequirements/{assigned_bin_id}/{req_bin_id}', [Faculty_RequirementBin_Controller::class, 'show_requirements'])->name('faculty_Requirements');



    //-------------------- File Pond Routes -----------------//
    // UPLOADING ROUTES
    Route::post('/upload-file', [UploadTemporaryFiles_Controller::class, 'uploadFile'])->name('upload_file');
    Route::delete('/delete-file', [DeleteTemporaryFiles_Controller::class, 'deleteFile'])->name('delete_file');
    Route::put('/faculty_upload-file/{id}', [FacultyUpload_Controller::class, 'uploadFile'])->name('faculty_uploadfile');


    });

