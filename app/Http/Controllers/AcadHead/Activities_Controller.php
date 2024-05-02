<?php

namespace App\Http\Controllers\AcadHead;
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

class Activities_Controller extends Controller
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
        ->select('activities.title', 'activities.start_datetime', 'activities.status', 'activities.end_datetime',
            'activity_types.title as type_title', 'activities.description', 'activities.location','activities.id',
            'activity_types.id as type')
        ->get();

        // Convert start_datetime and end_datetime to the desired format
        foreach ($activities as $activity) {
            $activity->start_datetime = Carbon::parse($activity->start_datetime)->format('F d, Y h:i A');
            $activity->end_datetime = Carbon::parse($activity->end_datetime)->format('F d, Y h:i A');
        }

        return view('Academic_head/AcadHead_Setup/AcadHead_Activities/AcadHead_Activities', compact('activities', 'activitytypes', 'deleted_activities'));

    }

           /**Creating Activity */
           public function Create_Activities(Request $request): JsonResponse{
            $validator = Validator::make($request->all(), [
                'title' => 'required|unique:activities',
                'description' => 'max:1000',
                'location' => 'max:400',
                'start_datetime' => 'required|date|after_or_equal:today',
                'end_datetime' => 'required|date|after_or_equal:today',
                'type' => 'required',
            ]);

            // Get the User ID of the logged in user
            $userId = Auth::user()->id;

            /**Codes to get the contents of the input field and save it to the database */
            $activities = new Activities();
            $activities->id = Str::uuid()->toString();
            $activities->title = $request ->title;
            $activities->description = $request ->description;

            $activities->location = $request ->location;
            $activities->activity_type_id = $request ->type;

            //This codes converts the date picker format into datetime format
            $start_datetime = trim($request->input('start_datetime'));
            $start_carbonDate = Carbon::createFromFormat('Y-m-d\TH:i', $start_datetime);
            $formatted_startDate = $start_carbonDate->format('Y-m-d H:i:s');
            $activities->start_datetime = $formatted_startDate;

            $end_datetime = trim($request->input('end_datetime'));
            $end_carbonDate = Carbon::createFromFormat('Y-m-d\TH:i', $end_datetime);
            $formatted_endDate = $end_carbonDate->format('Y-m-d H:i:s');
            $activities->end_datetime = $formatted_endDate;

            $activities->created_by = $userId;

            $today= Carbon::today();
            if($formatted_startDate <= $today->format('Y-m-d H:i:s'))
            {
                 $activities->status = "Ongoing";
            }
            else{
                 $activities->status = "Pending";
            }

            if($validator->fails()){
                return response()->json([
                    'success' => false,
                    'message' => 'Validation error',
                    'errors' => $validator->errors(),
                ]);
            }
            else{
                $activities->save();
                return response()->json([
                    'success' => true,
                    'message' => 'Activity successfully created.'
                  ], 200);
            }

        }

          /**Update current existing Activity */
          public function updateActivities(Request $request, $id): JsonResponse{
            $validator = Validator::make($request->all(), [
                'title' => 'required|unique:activities',
                'description' => 'max:1000',
                'location' => 'max:400',
                'start_datetime' => 'required|date|after_or_equal:today',
                'end_datetime' => 'required|date|after_or_equal:today',
                'type' => 'required',
            ]);

            // Get the User ID of the logged in user
            $userId = Auth::user()->id;

            /**Codes to get the contents of the input field and save it to the database */
            $activities = Activities::find($id);
            $activities->title = $request ->title;
            $activities->description = $request ->description;
            $activities->location = $request ->location;
            $activities->activity_type_id = $request ->type;

            //This codes converts the date picker format into datetime format
            $start_datetime = trim($request->input('start_datetime'));
            $start_carbonDate = Carbon::createFromFormat('Y-m-d\TH:i', $start_datetime);
            $formatted_startDate = $start_carbonDate->format('Y-m-d H:i:s');
            $activities->start_datetime = $formatted_startDate;

            $end_datetime = trim($request->input('end_datetime'));
            $end_carbonDate = Carbon::createFromFormat('Y-m-d\TH:i', $end_datetime);
            $formatted_endDate = $end_carbonDate->format('Y-m-d H:i:s');
            $activities->end_datetime = $formatted_endDate;

            $activities->updated_by = $userId;

            $today= Carbon::today();
            if($formatted_startDate <= $today->format('Y-m-d H:i:s'))
            {
                 $activities->status = "Ongoing";
            }
            else{
                 $activities->status = "Pending";
            }

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation error',
                    'errors' => $validator->errors(),
                ]);
            }
            else {
                $activities->save();
                return response()->json(['success' => true, 'message' => 'Activities successfully updated.'], 200);
            }

        }

        //Soft Deleting a record
        public function delete($id)
        {   $user_id = Auth::user()->id;
            $activity = Activities::find($id);
            $activity->is_deleted = true;
            $activity->updated_by = $user_id;
            $activity->save();
            $activity->delete();
            return back()->with('success', 'Activity deleted successfully!'); /**Alert Message */
        }


        public function restore(Request $request)
        {   $deleted_activities = $request->input('deleted_reqs');

            if ($deleted_activities != null)
            {
                foreach( $deleted_activities as $activity_id ) {

                    $activities = Activities::withTrashed()->findOrFail($activity_id);
                    $activities->is_deleted = false;
                    $activities->save();
                    $activities->restore();
                }
                return back()->with('success', 'Activity restored successfully!'); /**Alert Message */
            }
            else{
                return back()->with('error', "You didn't selected any of the records to restore!"); /**Alert Message */
            }
        }

        //HARD DELETE Requiremnts
        public function destroy($id)
        {   // Find the role by its ID
            $activity = Activities::withTrashed()->findOrFail($id);
            $activity->forceDelete();

            return back()->with('success', 'Activity permanently deleted successfully!'); /**Alert Message */
        }
}

