<?php

namespace App\Http\Controllers\AcadHead;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;


use App\Models\FacultyType;


use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session; /**For the session to work */
use Hash; /**For hashing the password */
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class FacultyType_Controller extends Controller
{
    /**Creating Faculty Type */
    public function Create_FacultyType(Request $request): JsonResponse{
        $validator = Validator::make($request->all(), [
            'title'=>'required|unique:faculty_types',
            'description'=>'max:300'
        ]);

        // Get the user ID of the logged in user
        $userId = Auth::user()->id;

        /**Codes to get the contents of the input field and save it to the database */
        $faculty_type = new facultyType();
        $faculty_type->id = Str::uuid()->toString();
        $faculty_type->title = $request ->title;
        $faculty_type->description = $request ->description;
        $faculty_type->created_by = $userId;

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors(),
            ]);
        }
        else {
            $faculty_type->save();
            return response()->json(['success' => true, 'message' => 'Faculty Type successfully created.'], 200);
        }

    }

    public function deleteFacultytypes($id)
    {   // Find the Faculty Type by its ID
        $type = facultyType::find($id);

        // Check if the Faculty Type exists
        if ($type) {
            // Delete the Faculty Type
            $type->delete();
            // Redirect to a success page or perform any other actions
            // You can customize this based on your requirements
            return back()->with('success', 'Faculty Type deleted successfully');
        }
        // If the Faculty Type doesn't exist, redirect with an error message
        return back()->with('error', 'Faculty Type not found');
    }

    //UPDATE Faculty Types
    public function updateFacultytypes(Request $request, $id): JsonResponse
    {

        $validator = Validator::make($request->all(), [
            'title'=>'required|unique:faculty_types',
            'description'=>'max:300'
        ]);

        // Get the user ID of the logged in user
        $userId = Auth::user()->id;

        $type = facultyType::find($id);
        $type->title = $request->input('title');
        $type->description = $request->input('description');
        $type->updated_by = $userId;

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors(),
            ]);
        }
        else {
            $type->save();
            return response()->json(['success' => true, 'message' => 'Faculty Type successfully updated.'], 200);
        }

    }

}

