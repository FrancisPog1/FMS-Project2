<?php

namespace App\Http\Controllers\Director;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Activities;
Use Carbon\Carbon;

use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session; /**For the session to work */
use Hash; /**For hashing the password */
use Brian2694\Toastr\Facades\Toastr;

class Director_Activities_Controller extends Controller
{
    public function show(){
        $deleted_activities = Activities::onlyTrashed()
        ->where('is_deleted', true)
        ->get();

        $activitytypes = DB::table('activity_types')->get();

        $activities = DB::table('activities')
        ->join('activity_types', 'activities.activity_type_id', '=', 'activity_types.id')
        ->where('activities.is_deleted', false)
        ->where('activities.deleted_at', null)
        ->select('activities.title',
                'activities.start_datetime',
                'activities.status',
                'activities.end_datetime',
                'activity_types.title as type_title',
                'activities.description',
                'activities.location',
                'activities.id',
                'activity_types.id as type')
        ->get();

        // Convert start_datetime and end_datetime to the desired format
        foreach ($activities as $activity) {
            $activity->start_datetime = Carbon::parse($activity->start_datetime)->format('F d, Y h:i A');
            $activity->end_datetime = Carbon::parse($activity->end_datetime)->format('F d, Y h:i A');
        }

        return view('Director/Director_Activities/Director_Activities', compact('activities', 'activitytypes', 'deleted_activities'));

    }

}

