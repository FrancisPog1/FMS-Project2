<?php

namespace App\Http\Controllers\AcadHead;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\DB;
use App\Models\RequirementBin;
Use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session; /**For the session to work */
use Hash; /**For hashing the password */
use Brian2694\Toastr\Facades\Toastr;

use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class RequirementBin_Controller extends Controller
{
    public function show(){
        $deleted_requirementbins = RequirementBin::onlyTrashed()
        ->where('is_deleted', true)
        ->get();

        $requirementbins = RequirementBin::where('deleted_at', null)
        ->where('is_deleted', false)
        ->get();

        foreach ($requirementbins as $requirementbin) {
            $requirementbin->deadline = Carbon::parse($requirementbin->deadline)->format('F d, Y h:i A');
        }

        return view('Academic_head/AcadHead_Setup/AcadHead_RequirementBin/AcadHead_RequirementBin',
        compact('deleted_requirementbins', 'requirementbins'));

    }

    public function filtered_bin(Request $request){
        if ($request->ajax()) {
            $query = RequirementBin::whereNull('deleted_at')
                ->where('is_deleted', false);

            if ($request->bins) {

                if ($request->bins == 'All') {
                    $query = $query;
                }
                else{
                    $query->where('status', $request->bins);
                }
            }

            if ($request->deadline) {
                $deadline = Carbon::parse($request->deadline)->format('Y-m-d');
                $query->whereDate('deadline', $deadline);
            }

            $requirementbins = $query->get();

            foreach ($requirementbins as $requirementbin) {
                $requirementbin->deadline = Carbon::parse($requirementbin->deadline)->format('F d, Y h:i A');
            }

            return response()->json(['requirementbins' => $requirementbins]);
        }

    }


    public function sorted_bin(Request $request)
    {
        if ($request->ajax()) {
            $query = RequirementBin::whereNull('deleted_at')
                ->where('is_deleted', false);

            if ($request->bins) {
                $sort = $request->bins;
                switch ($sort) {
                    case 'az':
                        $query->orderBy('title', 'asc');
                        break;
                    case 'za':
                        $query->orderBy('title', 'desc');
                        break;
                    case 'newest':
                        $query->orderBy('deadline', 'desc');
                        break;
                    case 'oldest':
                        $query->orderBy('deadline', 'asc');
                        break;
                    case 'All':
                        $query->orderBy('deadline', 'desc');
                        break;
                    default:
                        break;
                }
            }

            $requirementbins = $query->get();

            foreach ($requirementbins as $requirementbin) {
                $requirementbin->deadline = Carbon::parse($requirementbin->deadline)->format('F d, Y h:i A');
            }

            return response()->json(['requirementbins' => $requirementbins]);
        }

    }
        // ------------------------THIS ARE THE CODES FOR THE REQUIREMENT ASSIGNEES PAGE-------------------------- //
        public function view_assigned_user($bin_id){
            $assigned_reqrs = DB::table('users')
            ->join('user_assigned_to_requirement_bins', 'users.id', '=', 'user_assigned_to_requirement_bins.assigned_to')
            ->join('requirement_bins', 'requirement_bins.id', '=', 'user_assigned_to_requirement_bins.requirement_bin_id')
            ->join('roles', 'roles.id', '=', 'users.foreign_role_id')
            ->where('requirement_bins.id', '=', $bin_id)
            ->select('users.id as user_id','users.email as email', 'roles.title as role_type',
            'user_assigned_to_requirement_bins.review_status as review_status',
            'user_assigned_to_requirement_bins.compliance_status as compliance_status',
            'user_assigned_to_requirement_bins.id as id', 'requirement_bins.id as req_bin_id')
            ->get();

            return view('Academic_head/AcadHead_Setup/AcadHead_RequirementAssignees/AcadHead_RequirementAssignees', compact('assigned_reqrs', 'bin_id'));
        }


        public function filtered_assignees(Request $request, $bin_id){
            if($request->ajax())
            {
                $query = DB::table('users')
                ->join('user_assigned_to_requirement_bins', 'users.id', '=', 'user_assigned_to_requirement_bins.assigned_to')
                ->join('requirement_bins', 'requirement_bins.id', '=', 'user_assigned_to_requirement_bins.requirement_bin_id')
                ->join('roles', 'roles.id', '=', 'users.foreign_role_id')
                ->where('requirement_bins.id', '=', $bin_id)
                ->select('users.id as user_id','users.email as email', 'roles.title as role_type',
                'user_assigned_to_requirement_bins.review_status as review_status',
                'user_assigned_to_requirement_bins.compliance_status as compliance_status',
                'user_assigned_to_requirement_bins.id as id', 'requirement_bins.id as req_bin_id');

                if($request->option)
                {
                    $option = $request->option;
                    switch ($option) {
                        case 'All':
                            $query = $query;
                            break;
                        case 'Faculty':
                            $query->where('roles.title', $option);
                            break;
                        case 'Director':
                            $query->where('roles.title', $option);
                            break;
                        case 'Staff':
                            $query->where('roles.title', $option);
                            break;

                        case 'Reviewed':
                            $query->where('review_status', $option);
                            break;
                        case 'Pending':
                            $query->where('review_status', $option);
                            break;

                        case 'Completed':
                            $query->where('compliance_status', $option);
                            break;
                        case 'Incomplete':
                            $query->where('compliance_status', $option);
                            break;
                        case 'Pending':
                            $query->where('compliance_status', $option);
                            break;
                        default:
                            break;
                    }

                }
                $assignees = $query->get();
                return response()->json(['assignees' => $assignees]);

            }

        }


        public function sorted_assignees(Request $request, $bin_id){
            $query = DB::table('users')
            ->join('user_assigned_to_requirement_bins', 'users.id', '=', 'user_assigned_to_requirement_bins.assigned_to')
            ->join('requirement_bins', 'requirement_bins.id', '=', 'user_assigned_to_requirement_bins.requirement_bin_id')
            ->join('roles', 'roles.id', '=', 'users.foreign_role_id')
            ->where('requirement_bins.id', '=', $bin_id)
            ->select('users.id as user_id','users.email as email', 'roles.title as role_type',
            'user_assigned_to_requirement_bins.review_status as review_status',
            'user_assigned_to_requirement_bins.compliance_status as compliance_status',
            'user_assigned_to_requirement_bins.id as id', 'requirement_bins.id as req_bin_id');

            if($request->option)
            {
                $option = $request->option;
                switch ($option) {
                    case 'All':
                        $query = $query;
                        break;
                    // case 'az':
                    //     $query->where('users.name', $option);
                    //     break;
                    // case 'za':
                    //     $query->where('users.name', $option);
                    //     break;
                    case 'e_az':
                        $query->orderBy('email', 'asc');
                        break;
                    case 'e_za':
                        $query->orderBy('email', 'desc');
                        break;
                    default:
                        break;
                }

            }
            $assignees = $query->get();
            return response()->json(['assignees' => $assignees]);
        }




        /**Creating Requirement Bin */
        public function Create_RequirementBin(Request $request){
            $request->validate([
                'title' => 'required|unique:requirement_bins',
                'description' => 'max:300',
                'deadline' => 'required|date|after_or_equal:today',
                'status' => 'nullable'
            ]);
            // Get the ID of the logged in user
            $userId = Auth::user()->id;

            /**Codes to get the contents of the input field and save it to the database */
            $reqbin = new RequirementBin();
            $reqbin->id = Str::uuid()->toString();
            $reqbin->title = $request ->title;
            $reqbin->description = $request ->description;

            //This codes converts the date picker format into datetime format
            $deadline = trim($request->input('deadline'));
            $carbonDate = Carbon::createFromFormat('Y-m-d\TH:i', $deadline);
            $formattedDate = $carbonDate->format('Y-m-d H:i:s');
            $reqbin->deadline = $formattedDate;

            $reqbin->status = $request ->status;
            $reqbin->created_by =  $userId;

            $res = $reqbin->save();
            if($res){
                return back()->with('success', 'You have created a Requirement Bin!'); /**Alert Message */
            }
            else{
                return back()->with('fail', 'Something went Wrong');
            }

        }
        //Delete Requirement Bin
        public function deleteRequirementBins($id)
        {   $user_id = Auth::user()->id;
            $designation = RequirementBin::find($id);
            $designation->is_deleted = true;
            $designation->updated_by = $user_id;
            $designation->save();
            $designation->delete();
            return back()->with('success', 'Requirement Bin deleted successfully!'); /**Alert Message */
        }


        //UPDATE REQUIREMENT BIN
        public function updateRequirementbins(Request $request, $id)
        {
            // Get the ID of the logged in user
            $userId = Auth::user()->id;

            $req_bin = RequirementBin::find($id);
            $req_bin->title = $request->input('title');
            $req_bin->description = $request->input('description');

            //This codes converts the date picker format into datetime format
            $deadline = trim($request->input('deadline'));
            $carbonDate = Carbon::createFromFormat('Y-m-d\TH:i', $deadline);
            $formattedDate = $carbonDate->format('Y-m-d H:i:s');
            $req_bin->deadline = $formattedDate;
            $req_bin->status = $request ->input('status');
            $req_bin->updated_by =  $userId;


            $req_bin->save();

            return back()->with('success', 'Requirement Type updated successfully.');
        }

        public function restore(Request $request)
    {   $deleted_requirementbins = $request->input('deleted_reqs');

        if ($deleted_requirementbins != null)
        {
            foreach( $deleted_requirementbins as $requirementbin_id ) {

                $requirementbins = RequirementBin::withTrashed()->findOrFail($requirementbin_id);
                $requirementbins->is_deleted = false;
                $requirementbins->save();
                $requirementbins->restore();
            }
            return back()->with('success', 'Requirement Bin restored successfully!'); /**Alert Message */
        }
        else{
            return back()->with('error', "You didn't selected any of the records to restore!"); /**Alert Message */
        }
    }

        //HARD DELETE Requiremnts
        public function destroy($id)
        {   // Find the role by its ID
            $requirementbin = RequirementBin::withTrashed()->findOrFail($id);
            $requirementbin->forceDelete();

            return back()->with('success', 'Requirement Bin permanently deleted successfully!'); /**Alert Message */
        }
}

