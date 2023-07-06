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

    public function show(){
        $deleted_ranks = AcademicRank::onlyTrashed()
        ->where('is_deleted', true)
        ->get();

        $acadranks = AcademicRank::where('deleted_at', null)
        ->where('is_deleted', false)
        ->get();

        return view('Academic_head/Admin_Setup/AcadHead_AcademicRank/AcadHead_AcademicRank',
        compact('deleted_ranks', 'acadranks'));
    }

    public function filteredAndSortedRank(Request $request){
        if ($request->ajax()) {
            $query = AcademicRank::whereNull('deleted_at')
                ->where('is_deleted', false);

            if ($request->option) {
                $option = $request->option;
                switch ($option) {
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

            $ranks = $query->get();
            return response()->json(['ranks' => $ranks]);
        }

    }


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
    {   $user_id = Auth::user()->id;
        $acad_rank = AcademicRank::find($id);
        $acad_rank->is_deleted = true;
        $acad_rank->updated_by = $user_id;
        $acad_rank->save();
        $acad_rank->delete();
        return back()->with('success', 'Academic Rank deleted successfully!'); /**Alert Message */
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


    public function restore(Request $request)
    {   $deleted_ranks = $request->input('deleted_reqs');

        if ($deleted_ranks != null)
        {
            foreach( $deleted_ranks as $rank_id ) {

                $acad_rank = AcademicRank::withTrashed()->findOrFail($rank_id);
                $acad_rank->is_deleted = false;
                $acad_rank->save();
                $acad_rank->restore();
            }
            return back()->with('success', 'Academic Rank restored successfully!'); /**Alert Message */
        }
        else{
            return back()->with('error', "You didn't selected any of the records to restore!"); /**Alert Message */
        }
    }

        //HARD DELETE Requiremnts
        public function destroy($id)
        {   // Find the role by its ID
            $acad_rank = AcademicRank::withTrashed()->findOrFail($id);
            $acad_rank->forceDelete();

            return back()->with('success', 'Academic Rank permanently deleted successfully!'); /**Alert Message */

        }


}

