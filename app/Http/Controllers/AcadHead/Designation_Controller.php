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

    public function show(){
        $deleted_designations = Designation::onlyTrashed()
        ->where('is_deleted', true)
        ->get();

        $designations = Designation::where('deleted_at', null)
        ->where('is_deleted', false)
        ->get();

        return view('Academic_head/Admin_Setup/AcadHead_Designation/AcadHead_Designation',
        compact('deleted_designations', 'designations'));
    }

    public function filteredAndSortedDesignation(Request $request){
        if ($request->ajax()) {
            $query = Designation::whereNull('deleted_at')
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

            $designations = $query->get();
            return response()->json(['designations' => $designations]);
        }

    }

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
    {   $user_id = Auth::user()->id;
        $designation = Designation::find($id);
        $designation->is_deleted = true;
        $designation->updated_by = $user_id;
        $designation->save();
        $designation->delete();
        return back()->with('success', 'Designation deleted successfully!'); /**Alert Message */
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

    public function restore(Request $request)
    {   $deleted_designations = $request->input('deleted_reqs');

        if ($deleted_designations != null)
        {
            foreach( $deleted_designations as $designation_id ) {

                $designations = Designation::withTrashed()->findOrFail($designation_id);
                $designations->is_deleted = false;
                $designations->save();
                $designations->restore();
            }
            return back()->with('success', 'Designation restored successfully!'); /**Alert Message */
        }
        else{
            return back()->with('error', "You didn't selected any of the records to restore!"); /**Alert Message */
        }
    }

        //HARD DELETE Requiremnts
        public function destroy($id)
        {   // Find the role by its ID
            $designation = Designation::withTrashed()->findOrFail($id);
            $designation->forceDelete();

            return back()->with('success', 'Designation permanently deleted successfully!'); /**Alert Message */
        }
}

