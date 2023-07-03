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

//------------------------------------------------------------------ STAFF --------------------------------------------------------------------//
Route::middleware(['auth', 'isStaff'])->group(function () {
    Route::get('/StaffClassObservation', function () {
        return view('Staff/Staff_ClassObservation', ['page_title' => 'Staff Class Observation']);
        })->name('Staff_ClassObservation');

    Route::get('/StaffClassSchedule', function () {
        return view('Staff/Staff_ClassSchedule', ['page_title' => 'Staff Class Schedule']);
        })->name('Staff_ClassSchedule');

    Route::get('/StaffDashboard', function () {
        return view('Staff/Staff_Dashboard', ['page_title' => 'Staff Dashboard']);
        })->name('Staff_Dashboard');

    /**Staff Requirement Bin*/
    Route::get('/StaffRequirementBin', function () {
        return view('Staff/Staff_RequirementBin', ['page_title' => ' Staff Requirement Bin']);
        })->name('staff_RequirementBin');

                    //Retrieving Program Data in the DB
                    Route::get('/StaffRequirementBin', function () {
                        $requirementbins = DB::table('requirement_bins')->get();
                        //Format the deadline or date into more readable date format
                        foreach ($requirementbins as $requirementbin) {
                            $requirementbin->deadline = Carbon::parse($requirementbin->deadline)->format('F d, Y h:i A');
                        }
                        return view('Staff/Staff_RequirementBin', compact('requirementbins'));
                    });


        /**Staff Activities*/
    Route::get('/StaffActivities', function () {
        return view('Staff/Staff_Activities', ['page_title' => ' Staff Activities']);
        })->name('staff_Activities');

                //Retrieving Activity Types Data in the DB
                Route::get('/StaffActivities', function () {
                    $activitytypes = DB::table('activity_types')->get();

                    $activities = DB::table('activities')
                        ->join('activity_types', 'activities.activity_type_id', '=', 'activity_types.id')
                        ->select('activities.title', 'activities.start_datetime', 'activities.status', 'activities.end_datetime', 'activity_types.title as type_title')
                        ->get();

                    // Convert start_datetime and end_datetime to the desired format
                    foreach ($activities as $activity) {
                        $activity->start_datetime = Carbon::parse($activity->start_datetime)->format('F d, Y h:i A');
                        $activity->end_datetime = Carbon::parse($activity->end_datetime)->format('F d, Y h:i A');
                    }

                    return view('Staff/Staff_Activities', compact('activities', 'activitytypes'));

                });

    // Route::get('/StaffProfile', function () {
    //     return view('Staff/Staff_Profile', ['page_title' => 'Staff Profile']);
    //     })->name('Staff_Profile');

    Route::get('/StaffReports', function () {
        return view('Staff/Staff_Reports', ['page_title' => 'Staff Reports']);
        })->name('Staff_Reports');


    });


