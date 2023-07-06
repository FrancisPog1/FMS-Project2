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
    public function show(){
        $deleted_specializations = Specialization::onlyTrashed()
        ->where('is_deleted', true)
        ->get();

        $specializations = Specialization::where('deleted_at', null)
        ->where('is_deleted', false)
        ->get();

        return view('Academic_head/Admin_Setup/AcadHead_Specialization/AcadHead_Specialization',
        compact('deleted_specializations', 'specializations'));
    }

    public function filteredAndSortedSpecialization(Request $request){
        if ($request->ajax()) {
            $query = Specialization::whereNull('deleted_at')
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

            $specializations = $query->get();
            return response()->json(['specializations' => $specializations]);
        }

    }


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
    {   $user_id = Auth::user()->id;
        $designation = Specialization::find($id);
        $designation->is_deleted = true;
        $designation->updated_by = $user_id;
        $designation->save();
        $designation->delete();
        return back()->with('success', 'Specialization deleted successfully!'); /**Alert Message */
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

    public function restore(Request $request)
    {   $deleted_designations = $request->input('deleted_reqs');

        if ($deleted_designations != null)
        {
            foreach( $deleted_designations as $designation_id ) {

                $designations = Specialization::withTrashed()->findOrFail($designation_id);
                $designations->is_deleted = false;
                $designations->save();
                $designations->restore();
            }
            return back()->with('success', 'Specialization restored successfully!'); /**Alert Message */
        }
        else{
            return back()->with('error', "You didn't selected any of the records to restore!"); /**Alert Message */
        }
    }

        //HARD DELETE Requiremnts
        public function destroy($id)
        {   // Find the role by its ID
            $designation = Specialization::withTrashed()->findOrFail($id);
            $designation->forceDelete();

            return back()->with('success', 'Specialization permanently deleted successfully!'); /**Alert Message */
        }

}

