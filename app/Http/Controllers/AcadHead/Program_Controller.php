<?php

namespace App\Http\Controllers\AcadHead;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\User;


use App\Models\Program;


use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session; /**For the session to work */
use Hash; /**For hashing the password */
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;


class Program_Controller extends Controller
{
    public function show(){
        $deleted_programs = Program::onlyTrashed()
        ->where('is_deleted', true)
        ->get();

        $programs = Program::where('deleted_at', null)
        ->where('is_deleted', false)
        ->get();

        return view('Academic_head/Admin_Setup/AcadHead_Programs/AcadHead_Programs',
        compact('deleted_programs', 'programs'));
    }


    /**Creating  Program*/
    public function Create_Program(Request $request): JsonResponse {
        $validator = Validator::make($request->all(), [
            'title'=>'required|unique:programs',
            'description'=>'max:300'
        ]);

        // Get the user ID of the logged in user
        $userId = Auth::user()->id;

        /**Codes to get the contents of the input field and save it to the database */
        $program = new Program();
        $program->id = Str::uuid()->toString();
        $program->title = $request ->title;
        $program->description = $request ->description;
        $program->created_by = $userId;

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors(),
            ]);
        }
        else {
            $program->save();
            return response()->json(['success' => true, 'message' => 'Program successfully created.'], 200);
        }

    }

    public function deletePrograms($id)
    {   $user_id = Auth::user()->id;
        $program = Program::find($id);
        $program->is_deleted = true;
        $program->updated_by = $user_id;
        $program->save();
        $program->delete();
        return back()->with('success', 'Program deleted successfully!'); /**Alert Message */
    }

    //UPDATE PROGRAMS
    public function updatePrograms(Request $request, $id): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'title'=>'required|unique:programs',
            'description'=>'max:300'
        ]);

        // Get the user ID of the logged in user
        $userId = Auth::user()->id;

        $program = Program::find($id);
        $program->title = $request->input('title');
        $program->description = $request->input('description');
        $program->title = $request->input('title');
        $program->updated_by = $userId;



        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors(),
            ]);
        }
        else {
            $program->save();
            return response()->json(['success' => true, 'message' => 'Program successfully updated.'], 200);
        }
    }

    public function restore(Request $request)
    {   $deleted_programs = $request->input('deleted_reqs');

        if ($deleted_programs != null)
        {
            foreach( $deleted_programs as $program_id ) {

                $programs = Program::withTrashed()->findOrFail($program_id);
                $programs->is_deleted = false;
                $programs->save();
                $programs->restore();
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
            $program = Program::withTrashed()->findOrFail($id);
            $program->forceDelete();

            return back()->with('success', 'Faculty Type permanently deleted successfully!'); /**Alert Message */
        }


}

