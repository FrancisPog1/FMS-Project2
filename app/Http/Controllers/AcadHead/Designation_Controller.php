<?php

namespace App\Http\Controllers\AcadHead;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;


use App\Models\Designation;


use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session; /**For the session to work */
use Hash; /**For hashing the password */
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class Designation_Controller extends Controller
{
    /**Creating Designation */
    public function Create_Designation(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'title'=>'required|unique:designations',
            'description'=>'max:300'
        ]);

        // Get the user ID of the logged in user
        $userId = Auth::user()->id;

        /**Codes to get the contents of the input field and save it to the database */
        $designation = new Designation();
        $designation->id = Str::uuid()->toString();
        $designation->title = $request ->title;
        $designation->description = $request ->description;
        $designation->created_by = $userId;

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors(),
            ]);
        }
        else {
            $designation->save();
            return response()->json(['success' => true, 'message' => 'Designation successfully created.'], 200);
        }
    }

    public function deleteDesignations($id)
    {   // Find the designation by its ID
        $designation = Designation::find($id);

        // Check if the designation exists
        if ($designation) {
            // Delete the designation
            $designation->delete();
            // Redirect to a success page or perform any other actions
            // You can customize this based on your requirements
            return back()->with('success', 'Designation deleted successfully');
        }
        // If the designation doesn't exist, redirect with an error message
        return back()->with('error', 'Designation not found');
    }

    //UPDATE DESIGNATION
    public function updateDesignations(Request $request, $id): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'title'=>'required|unique:designations',
            'description'=>'max:300'
        ]);
        // Get the user ID of the logged in user
        $userId = Auth::user()->id;

        $designation = Designation::find($id);
        $designation->title = $request->input('title');
        $designation->description = $request->input('description');
        $designation->updated_by = $userId;

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors(),
            ]);
        }
        else {
            $designation->save();
            return response()->json(['success' => true, 'message' => 'Designation successfully updated.'], 200);
        }
    }
}

