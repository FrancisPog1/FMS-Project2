<?php

namespace App\Http\Controllers\Staff;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\ActivityParticipants;
use Illuminate\Support\Facades\DB;
use App\Models\Activities;
Use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session; /**For the session to work */
use Hash; /**For hashing the password */
use Brian2694\Toastr\Facades\Toastr;

class Staff_ActivitiesParticipants_Controller extends Controller
{
    public function show($activity_id){

        $participants = DB::table('activities')
        ->join('activity_participants', 'activity_participants.activity_id',  '=', 'activities.id')
        ->join('users', 'users.id', '=', 'activity_participants.participant_id')
        ->join('users_profiles', 'users_profiles.user_id', '=', 'users.id')
        ->join('roles', 'roles.id', '=', 'users.foreign_role_id')
        ->where('activity_participants.activity_id', '=', $activity_id)
        ->select('users.email', 'roles.title as role', 'activity_participants.id as id',
        'users_profiles.first_name', 'users_profiles.last_name')
        ->get();

        $activities = DB::table('activities')
        ->join('users', 'users.id', '=', 'activities.created_by')
        ->leftJoin('users_profiles', 'users_profiles.user_id', '=', 'activities.created_by')
        ->join('activity_types', 'activity_types.id', '=', 'activities.activity_type_id')
        ->where('activities.id', '=', $activity_id)
        ->select('activities.created_at'
                , 'activities.created_by'
                , 'activities.location'
                , 'activities.description'
                , 'activities.status'
                , 'activities.start_datetime'
                , 'activities.end_datetime'
                , 'activity_types.title as type'
                , 'activities.title'
                , 'users_profiles.first_name'
                , 'users_profiles.last_name'
                )
        ->get();

        foreach ($activities as $activity) {
            $activity->start_datetime = Carbon::parse($activity->start_datetime)->format('F d, Y h:i A');
            $activity->end_datetime = Carbon::parse($activity->end_datetime)->format('F d, Y h:i A');
            $activity->created_at = Carbon::parse($activity->created_at)->format('F d, Y h:i A');
        }

        $roles = DB::table('roles')->get();

        $users = DB::table('users')
        ->leftJoin('roles', 'roles.id', '=', 'users.foreign_role_id')
        ->leftJoin('users_profiles', 'users_profiles.user_id', '=', 'users.id')
        ->select('roles.title as role', 'users.email', 'users.id',
        'users_profiles.first_name', 'users_profiles.last_name')
        ->get();

        return view('Staff/Staff_ActivitiesParticipants/Staff_ActivitiesParticipants',
        compact('participants', 'roles', 'users', 'activity_id', 'activities'));

    }

    public function add_participants(Request $request, $activity_id)
    {   $userId = Auth::user()->id;
        $res=0;

        $users = $request->input('users');

        if($users != null)
        {

            foreach($users as $user)
            {
                $activity_participants = new ActivityParticipants();
                $activity_participants->id = Str::uuid()->toString();
                $activity_participants->assigned_by = $userId;
                $activity_participants->participant_id = $user;
                $activity_participants->activity_id = $activity_id;
                $activity_participants->is_required = true;

                $user_is_assigned = ActivityParticipants::where('participant_id', $user)
                ->where('activity_id',  $activity_id)
                ->exists();

                if ($user_is_assigned) {
                    // The user is already assigned, so skip this iteration
                    continue;
                }

                $res = $activity_participants->save();
            }

            if ($res) {
                return back()->with('success', 'Participants added successfully!');
            } else {
                return back()->with('error', 'The participants are already added to the activity');
            }
        }

        else
        {
            return back()->with('error', 'Please add a participant/s to the activity first');
        }

    }

    public function destroy($id)
    {
          //HARD DELETE Requiremnts
          // Find the role by its ID
              $participant = ActivityParticipants::findOrFail($id);
              $participant->forceDelete();
              return back()->with('success', 'Participant removed successfully!'); /**Alert Message */

          }


}

