<?php

namespace App\Http\Controllers\Faculty;
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

class Faculty_Activities_Controller extends Controller
{
    public function show(){

        $userID = Auth::user()->id;

        $activities = DB::table('activities')
        ->join('activity_participants', 'activity_participants.activity_id', '=', 'activities.id')
        ->join('users', 'users.id', '=', 'activity_participants.participant_id')
        ->join('activity_types', 'activity_types.id', '=', 'activities.activity_type_id')
        ->where('activities.is_deleted', false)
        ->where('activities.deleted_at', null)
        ->where('users.id', '=', $userID)
        ->select('activities.title'
                , 'activities.start_datetime'
                , 'activities.status'
                , 'activities.end_datetime'
                , 'activity_types.title as type_title'
                , 'activities.description'
                , 'activities.location'
                , 'activities.agenda'
                , 'activities.id'
                , 'activities.created_at'
                , 'users.email as email')

        ->get();

        // Convert start_datetime and end_datetime to the desired format
        foreach ($activities as $activity) {
            $activity->start_datetime = Carbon::parse($activity->start_datetime)->format('F d, Y h:i A');
            $activity->end_datetime = Carbon::parse($activity->end_datetime)->format('F d, Y h:i A');
            $activity->created_at = Carbon::parse($activity->created_at)->format('F d, Y h:i A');
        }

        return view('Faculty/Faculty_Activities/Faculty_Activities', compact('activities'));

    }
}

