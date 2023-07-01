<?php

namespace App\Http\Controllers\AcadHead;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;


use App\Models\Specialization;


use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session; /**For the session to work */
use Hash; /**For hashing the password */
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class Specialization_Controller extends Controller
{

    /**Creating Specialization */
    public function Create_Specialization(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'title'=>'required|unique:specializations',
            'description'=>'max:300'
        ]);

        // Get the user ID of the logged in user
        $userId = Auth::user()->id;

        /**Codes to get the contents of the input field and save it to the database */
        $specialization = new Specialization();
        $specialization->id = Str::uuid()->toString();
        $specialization->title = $request ->title;
        $specialization->description = $request ->description;
        $specialization->created_by = $userId;

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors(),
            ]);
        }
        else {
            $specialization->save();
            return response()->json(['success' => true, 'message' => 'Specialization successfully created.'], 200);
        }

    }

    public function deleteSpecializations($id)
    {   // Find the specialization by its ID
        $specialization = Specialization::find($id);

        // Check if the specialization exists
        if ($specialization) {
            // Delete the specialization
            $specialization->delete();
            // Redirect to a success page or perform any other actions
            // You can customize this based on your requirements
            return back()->with('success', 'Specialization deleted successfully');
        }
        // If the role doesn't exist, redirect with an error message
        return back()->with('error', 'Specialization not found');
    }

    //UPDATE SPECIALIZATION
    public function updateSpecializations(Request $request, $id): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'title'=>'required|unique:specializations',
            'description'=>'max:300'
        ]);
        // Get the user ID of the logged in user
        $userId = Auth::user()->id;

        $specialization = Specialization::find($id);
        $specialization->title = $request->input('title');
        $specialization->description = $request->input('description');
        $specialization->updated_by = $userId;

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors(),
            ]);
        }
        else {
            $specialization->save();
            return response()->json(['success' => true, 'message' => 'Specialization successfully created.'], 200);
        }
    }

}

