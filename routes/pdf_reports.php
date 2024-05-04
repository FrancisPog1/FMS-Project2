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
use App\Http\Controllers\PDFReports_Controller;


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
Route::middleware('auth')->group(function () {

    Route::get('pdf-reports', [PDFReports_Controller::class, 'generateReports'])
    ->name('pdf-reports');


    });

