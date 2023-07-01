<?php

namespace App\Http\Controllers\AcadHead;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\AcademicRank;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session; /**For the session to work */
use Hash; /**For hashing the password */
use Brian2694\Toastr\Facades\Toastr;

use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class AcademicRank_Controller extends Controller
{
/**Codes for Creating Academic Rank */
    public function Create_AcadRank(Request $request): JsonResponse {
        /**Codes to validate the input fields of the registration page */
        $validator = Validator::make($request->all(), [
            'title'=>'required|unique:academic_ranks',
            'description'=>'max:300'
        ]);

        // Get the ID of the logged in user
        $userId = Auth::user()->id;

        /**Codes to get the contents of the input field and save it to the database */
        $AcadRank = new AcademicRank();
        $AcadRank->id = Str::uuid()->toString();
        $AcadRank->title = $request ->title;
        $AcadRank->description = $request ->description;
        $AcadRank->created_by =  $userId;

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors(),
            ]);
        }
        else {
            $AcadRank->save();
            return response()->json(['success' => true, 'message' => 'Academic Rank successfully created.'], 200);
        }
    }
    //DELETE RANKS
    public function deleteRanks($id)
    {   // Find the role by its ID
        $rank = AcademicRank::find($id);

        // Check if the role exists
        if ($rank) {
            // Delete the role
            $rank->delete();
            // Redirect to a success page or perform any other actions
            // You can customize this based on your requirements
            return back()->with('success', 'Rank deleted successfully');
        }
        // If the role doesn't exist, redirect with an error message
        return back()->with('error', 'Rank not found');
    }

    //UPDATE RANKS
    public function updateRanks(Request $request, $id): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'title'=>'required|unique:academic_ranks',
            'description'=>'max:300'
        ]);

        // Get the logged in user's ID
        $user_id = Auth::user()->id;

        $acadrank = AcademicRank::find($id);
        $acadrank->title = $request->input('title');
        $acadrank->description = $request->input('description');

        // Assign the user's ID to the user_id foreign key column
        $acadrank->updated_by = $user_id;

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors(),
            ]);
        }
        else {
            $acadrank->save();
            return response()->json(['success' => true, 'message' => 'Academic Rank updated successfully.'], 200);
        }
    }


}

