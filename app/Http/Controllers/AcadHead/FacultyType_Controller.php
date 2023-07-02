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

    public function show(){
        $deleted_types = FacultyType::onlyTrashed()
        ->where('is_deleted', true)
        ->get();

        $types = FacultyType::where('deleted_at', null)
        ->where('is_deleted', false)
        ->get();

        return view('Academic_head/Admin_Setup/AcadHead_FacultyType/AcadHead_FacultyType',
        compact('deleted_types', 'types'));
    }


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
    {   $user_id = Auth::user()->id;
        $type = FacultyType::find($id);
        $type->is_deleted = true;
        $type->updated_by = $user_id;
        $type->save();
        $type->delete();
        return back()->with('success', 'Faculty Type deleted successfully!'); /**Alert Message */
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

        $type = FacultyType::find($id);
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

    public function restore(Request $request)
    {   $deleted_types = $request->input('deleted_reqs');

        if ($deleted_types != null)
        {
            foreach( $deleted_types as $type_id ) {

                $types = FacultyType::withTrashed()->findOrFail($type_id);
                $types->is_deleted = false;
                $types->save();
                $types->restore();
            }
            return back()->with('success', 'Faculty Type restored successfully!'); /**Alert Message */
        }
        else{
            return back()->with('error', "You didn't selected any of the records to restore!"); /**Alert Message */
        }
    }

        //HARD DELETE Requiremnts
        public function destroy($id)
        {   // Find the role by its ID
            $type = FacultyType::withTrashed()->findOrFail($id);
            $type->forceDelete();

            return back()->with('success', 'Faculty Type permanently deleted successfully!'); /**Alert Message */
        }

}

