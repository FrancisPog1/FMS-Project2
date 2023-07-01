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
    {   // Find the Activity Type by its ID
        $act_type = ActivityType::find($id);

        // Check if the Activity Type exists
        if ($act_type) {
            // Delete the Activity Type
            $act_type->delete();
            // Redirect to a success page or perform any other actions
            // You can customize this based on your requirements
            return back()->with('success', 'Activity Type deleted successfully');
        }
        // If the Activity Type doesn't exist, redirect with an error message
        return back()->with('error', 'Activity Type not found');
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

}

