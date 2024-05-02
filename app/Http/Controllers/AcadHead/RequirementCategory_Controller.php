<?php

namespace App\Http\Controllers\AcadHead;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use App\Models\RequirementCategory;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session; /**For the session to work */
use Hash; /**For hashing the password */
use Brian2694\Toastr\Facades\Toastr;

use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class RequirementCategory_Controller extends Controller
{

    public function show(){
        $deleted_categories = RequirementCategory::onlyTrashed()
        ->get();

        $categories = RequirementCategory::where('deleted_at', null)
        ->get();

        return view('Academic_head/Admin_Setup/AcadHead_RequirementCategory/AcadHead_RequirementCategory',
        compact('deleted_categories', 'categories'));
    }

/**Codes for Creating Academic Rank */
    public function store(Request $request): JsonResponse {
        /**Codes to validate the input fields of the registration page */
        $validator = Validator::make($request->all(), [
            'title'=>'required|unique:requirement_categories',
            'description'=>'max:300'
        ]);

        // Get the ID of the logged in user
        $userId = Auth::user()->id;

        /**Codes to get the contents of the input field and save it to the database */
        $AcadRank = new RequirementCategory();
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
            return response()->json(['success' => true, 'message' => 'Requirement Category successfully created.'], 200);
        }
    }
    //DELETE RANKS
    public function deleteCategory($id)
    {   $user_id = Auth::user()->id;
        $acad_rank = RequirementCategory::find($id);
        $acad_rank->updated_by = $user_id;
        $acad_rank->save();
        $acad_rank->delete();
        return back()->with('success', 'Requirement Category deleted successfully!'); /**Alert Message */
    }

    //UPDATE RANKS
    public function update(Request $request, $id): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'title'=>'required|unique:requirement_categories',
            'description'=>'max:300'
        ]);

        // Get the logged in user's ID
        $user_id = Auth::user()->id;

        $acadrank = RequirementCategory::find($id);
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
            return response()->json(['success' => true, 'message' => 'Requirement Category updated successfully.'], 200);
        }
    }


    public function restore(Request $request)
    {   $deleted_ranks = $request->input('deleted_reqs');

        if ($deleted_ranks != null)
        {
            foreach( $deleted_ranks as $rank_id ) {
                $acad_rank = RequirementCategory::withTrashed()->findOrFail($rank_id);
                $acad_rank->save();
                $acad_rank->restore();
            }
            return back()->with('success', 'Requirement Category restored successfully!'); /**Alert Message */
        }
        else{
            return back()->with('error', "You didn't selected any of the records to restore!"); /**Alert Message */
        }
    }

        //HARD DELETE Requiremnts
        public function destroy($id)
        {   // Find the role by its ID
            $acad_rank = RequirementCategory::withTrashed()->findOrFail($id);
            $acad_rank->forceDelete();

            return back()->with('success', 'Requirement Category permanently deleted successfully!'); /**Alert Message */

        }


}

