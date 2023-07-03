<?php

use Illuminate\Support\Facades\Route;

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


    Route::get('/DirectorDashboard', function () {
        return view('Director/Director_Dashboard', ['page_title' => 'Director Dashboard']);
        })->name('Director_Dashboard');

    // Route::get('/DirectorProfile', function () {
    //     return view('Director/Director_Profile', ['page_title' => 'Director Profile']);
    //     })->name('Director_Profile');

    Route::get('/DirectorReports', function () {
        return view('Director/Director_Reports', ['page_title' => 'Director Reports']);
        })->name('Director_Reports');
});


