<?php

namespace App\Http\Controllers\AcadHead;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\User;



use App\Models\ActivityType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session; /**For the session to work */
use Hash; /**For hashing the password */
use Brian2694\Toastr\Facades\Toastr;

use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class ActivityType_Controller extends Controller
{
    public function show(){
        $deleted_types = ActivityType::onlyTrashed()
        ->where('is_deleted', true)
        ->get();

        $activity_types = ActivityType::where('deleted_at', null)
        ->where('is_deleted', false)
        ->get();

        return view('Academic_head/AcadHead_Setup/AcadHead_ActivityType/AcadHead_ActivityType',
        compact('deleted_types', 'activity_types'));
    }


    public function filteredAndSortedActivitytype(Request $request){
        if ($request->ajax()) {
            $query = ActivityType::whereNull('deleted_at')
                ->where('is_deleted', false);

                if ($request->filter_option) {
                    $filterOption = $request->filter_option;
                    switch ($filterOption) {
                        case 'All':
                            $query = $query;
                            break;
                        case 'Meeting':
                            $query->where('category',  $filterOption);
                            break;
                        case 'Activity':
                            $query->where('category',  $filterOption);
                            break;
                        default:
                            break;
                    }
                }

            if ($request->sort_option) {
                $sortOption = $request->sort_option;
                switch ($sortOption) {
                    case 'az':
                        $query->orderBy('title', 'asc');
                        break;
                    case 'za':
                        $query->orderBy('title', 'desc');
                        break;
                    default:
                        break;
                }
            }

            if ($request->deadline) {
                $deadline = Carbon::parse($request->deadline)->format('Y-m-d');
                $query->whereDate('deadline', $deadline);
            }

            $types = $query->get();
            return response()->json(['types' => $types]);
        }

    }


    /**Creating Activity Type */
    public function Create_ActivityType(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'title'=>'required|unique:activity_types',
            'category'=>'required',
            'description'=>'max:300'
        ]);

        // Get the user ID of the logged in user
        $userId = Auth::user()->id;

        /**Codes to get the contents of the input field and save it to the database */
        $act_type = new ActivityType();
        $act_type->id = Str::uuid()->toString();
        $act_type->title = $request ->title;
        $act_type->description = $request ->description;
        $act_type->category = $request ->category;
        $act_type->category = $request ->category;
        $act_type->created_by = $userId;

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors(),
            ]);
        }
        else {
            $act_type->save();
            return response()->json(['success' => true, 'message' => 'Activity Type successfully created.'], 200);
        }
    }

    public function deleteActivitytypes($id)
    {   $user_id = Auth::user()->id;
        $type = ActivityType::find($id);
        $type->is_deleted = true;
        $type->updated_by = $user_id;
        $type->save();
        $type->delete();
        return back()->with('success', 'Activity Type deleted successfully!'); /**Alert Message */
    }

    //UPDATE ACTIVITY TYPES
    public function updateActivitytypes(Request $request, $id): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'title'=>'required|unique:activity_types',
            'category'=>'required',
            'description'=>'max:300'
        ]);

        // Get the user ID of the logged in user
        $userId = Auth::user()->id;
        $act_type = ActivityType::find($id);
        $act_type->title = $request->input('title');
        $act_type->description = $request->input('description');
        $act_type->category = $request ->input('category');


        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors(),
            ]);
        }
        else {
            $act_type->save();
            return response()->json(['success' => true, 'message' => 'Activity Type successfully updated.'], 200);
        }
    }


    public function restore(Request $request)
    {   $deleted_types = $request->input('deleted_reqs');

        if ($deleted_types != null)
        {
            foreach( $deleted_types as $type_id ) {

                $types = ActivityType::withTrashed()->findOrFail($type_id);
                $types->is_deleted = false;
                $types->save();
                $types->restore();
            }
            return back()->with('success', 'Activity Type restored successfully!'); /**Alert Message */
        }
        else{
            return back()->with('error', "You didn't selected any of the records to restore!"); /**Alert Message */
        }
    }

        //HARD DELETE Requiremnts
        public function destroy($id)
        {   // Find the role by its ID
            $type = ActivityType::withTrashed()->findOrFail($id);
            $type->forceDelete();

            return back()->with('success', 'Activity Type permanently deleted successfully!'); /**Alert Message */
        }

}

