<?php

namespace App\Http\Controllers\AcadHead;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;


use App\Models\RequirementBinContent;
use App\Models\RequirementBin;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session; /**For the session to work */
use Hash; /**For hashing the password */
use Brian2694\Toastr\Facades\Toastr;

<<<<<<< Updated upstream
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
=======

use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
>>>>>>> Stashed changes

class RequirementSetup_Controller extends Controller
{

<<<<<<< Updated upstream
    public function show(Request $request, $bin_id){
=======
    public function show(Request $request, $bin_id): JsonResponse {
>>>>>>> Stashed changes
        $requirementtypes = DB::table('requirement_types')->get();
        $requirement_bin = RequirementBin::where('id', $bin_id)->first();
        $roles = DB::table('roles')->get();

        $requirements = DB::table('requirement_bin_contents')
        ->join('requirement_types', 'requirement_bin_contents.foreign_requirement_types_id', '=', 'requirement_types.id')
        ->join('requirement_bins', 'requirement_bin_contents.foreign_requirement_bins_id', '=', 'requirement_bins.id')
        ->where('requirement_bins.id', '=', $bin_id)
        ->where('requirement_bin_contents.is_deleted', '=', false)
                ->select('requirement_types.title as title', 'requirement_bin_contents.notes as note',
                'requirement_bin_contents.file_format as file_format', 'requirement_bin_contents.id as id',
                'requirement_bin_contents.foreign_requirement_types_id as typeId')
        ->get();

        $deleted_requirements = DB::table('requirement_bin_contents')
        ->join('requirement_types', 'requirement_bin_contents.foreign_requirement_types_id', '=', 'requirement_types.id')
        ->where('requirement_bin_contents.is_deleted', '=', true)
                ->select('requirement_types.title as title', 'requirement_bin_contents.file_format as file_format',
                'requirement_bin_contents.id as id')
        ->get();

<<<<<<< Updated upstream

        // if ($request->ajax()){
        //     $users = DB::table('users')
        //     ->leftJoin('roles', 'roles.id', '=', 'users.foreign_role_id')
        //     ->where('roles.id', $request->role_id)
        //     ->select('roles.title as role', 'users.email', 'users.status', 'users.id')
        //     ->get();
        //     return response()->json(['users'=>$users]);
        // }
=======
        if($request->ajax())
        {
            $users = DB::table('users')
            ->leftJoin('roles', 'roles.id', '=', 'users.foreign_role_id')
            ->where('roles.id', '=', $request->types)
            ->select('roles.title as role', 'users.email', 'users.status', 'users.id')
            ->get();
            return reponse()->json(['users'=>$users]);
        }
>>>>>>> Stashed changes

        $users = DB::table('users')
        ->leftJoin('roles', 'roles.id', '=', 'users.foreign_role_id')
        ->select('roles.title as role', 'users.email', 'users.status', 'users.id')
        ->get();

        return view('Academic_head/AcadHead_Setup/AcadHead_Bin_Setup/AcadHead_Bin_Setup',
        compact('requirementtypes', 'bin_id', 'requirements', 'users', 'roles', 'deleted_requirements', 'requirement_bin'));
    }

    // public function filter_role(Request $request): JsonResponse {

    //     $roleId = $request->input('roles');

    //     $users = DB::table('users')
    //     ->leftJoin('roles', 'roles.id', '=', 'users.foreign_role_id')
    //     ->where('foreign_role_id', $roleId)
    //     ->select('roles.title as role', 'users.email', 'users.status', 'users.id')
    //     ->get();

    //     return response()->json($users);
    // }



/**Codes for Creating Requriement*/
    public function Create_Requirement(Request $request, $bin_id){
        /**Codes to validate the input fields of the registration page */

        $request->validate([
            'type'=>'required',
            'notes'=>'max:300'
        ]);
        try
        {
            // Get the ID of the logged in user
            $userId = Auth::user()->id;

            /**Codes to get the contents of the input field and save it to the database */
            $bin_setup = new RequirementBinContent();
            $bin_setup->id = Str::uuid()->toString();
            $bin_setup->foreign_requirement_types_id = $request->type;
            $bin_setup->foreign_requirement_bins_id = $bin_id;
            $bin_setup->notes = $request ->notes;
            $bin_setup->created_by =  $userId;
            $res = $bin_setup->save();

            if($res){
                return back()->with('success', 'You have Added Requirement!'); /**Alert Message */
            }
            else{
                return back()->with('fail', 'Something went Wrong');
            }
        }

        catch (QueryException $e) {
            if ($e->getCode() === '23000' && strpos($e->getMessage(), 'requirement_bin_contents_foreign_requirement_types_id_unique') !== false) {
                // Handle the specific integrity constraint violation error for the unique key constraint
                return back()->with('error', 'The requirement type already been created to this Requirement Bin.');
            }

            // Handle other query exceptions or rethrow the exception for general handling
            throw $e;
        }
    }
    //SOFT DELETE Requiremnts
    public function deleteRequirement($id)
    {   // Find the role by its ID
        $bin_content = RequirementBinContent::find($id);
        $bin_content->update(['is_deleted' => true]);
        $bin_content->delete();
        return back()->with('success', 'Requirement deleted successfully!'); /**Alert Message */

    }

    //UPDATE Requirements
    public function updateRequirement(Request $request, $id)
    {
        $request->validate([
            'type'=>'required',
            'notes'=>'max:300'
        ]);

        // Get the ID of the logged in user
        $userId = Auth::user()->id;

        /**Codes to get the contents of the input field and save it to the database */
        $bin_content = RequirementBinContent::find($id);
        $bin_content->foreign_requirement_types_id = $request->type;
        $bin_content->notes = $request ->notes;
        $bin_content->updated_by =  $userId;
        $res = $bin_content->save();

        if($res){
            return back()->with('success', 'Requirement updated successfully!'); /**Alert Message */
        }
        else{
            return back()->with('fail', 'Something went Wrong');
        }

    }

    public function restoreRequirement(Request $request)
    {   $deleted_requirements = $request->input('deleted_reqs');

        if ($deleted_requirements != null)
        {
            foreach( $deleted_requirements as $req_id ) {

                $bin_content = RequirementBinContent::withTrashed()->findOrFail($req_id);
                $bin_content->update(['is_deleted' => false]);
                $bin_content->restore();
            }


            echo $req_id;
            return back()->with('success', 'Requirement restored successfully!'); /**Alert Message */
        }
        else{
            return back()->with('error', "You didn't selected any of the records to restore!"); /**Alert Message */
        }
    }

        //HARD DELETE Requiremnts
        public function destroyRequirement($id)
        {   // Find the role by its ID
            $bin_content = RequirementBinContent::withTrashed()->findOrFail($id);
            $bin_content->forceDelete();

            return back()->with('success', 'Requirement permanently deleted successfully!'); /**Alert Message */

        }

}

