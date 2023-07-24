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

    public function filteredAndSortedBin(Request $request){
        if ($request->ajax()) {
            $query = RequirementBin::whereNull('deleted_at')
                ->where('is_deleted', false);

            if ($request->filter_option) {
                $filterOption = $request->filter_option;

                if ( $filterOption  == 'All') {
                    $query = $query;
                }
                else{
                    $query->where('status',  $filterOption);
                }
            }

            if ($request->sort_option) {
                $sortOption = $request->sort_option;
                switch ($sortOption) {
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

        // ------------------------THIS ARE THE CODES FOR THE REQUIREMENT ASSIGNEES PAGE-------------------------- //
        public function view_assigned_user($bin_id){
            $assigned_reqrs = DB::table('users')
            ->join('users_profiles', 'users_profiles.user_id', '=', 'users.id')
            ->join('user_assigned_to_requirement_bins as user_bins', 'users.id', '=', 'user_bins.assigned_to')
            ->join('requirement_bins as bin', 'bin.id', '=', 'user_bins.requirement_bin_id')
            ->join('roles', 'roles.id', '=', 'users.foreign_role_id')
            ->where('bin.id', '=', $bin_id)
            ->select('users.id as user_id','users.email as email', 'roles.title as role_type',
                    'user_bins.review_status as review_status',
                    'user_bins.compliance_status as compliance_status',
                    'user_bins.id as id', 'bin.id as req_bin_id',
                    'users_profiles.first_name', 'users_profiles.last_name')
            ->get();

            $requirementbin = DB::table('requirement_bins as bin')
            ->leftJoin('users', 'users.id', '=' ,'bin.created_by')
            ->leftJoin('users_profiles', 'users_profiles.user_id', '=', 'bin.created_by')
            ->where('bin.id', '=', $bin_id)
            ->select('bin.title as bin_title', 'bin.status as bin_status', 'bin.created_by as bin_created_by',
                'bin.created_at as bin_created_at','bin.description as bin_description',
                'bin.deadline as bin_deadline',
                'users_profiles.first_name', 'users_profiles.last_name')
            ->get();

            foreach ($requirementbin as $bin) {
                $bin->bin_deadline = Carbon::parse($bin->bin_deadline)->format('F d, Y h:i A');
            }

            return view('Academic_head/AcadHead_Setup/AcadHead_RequirementAssignees/AcadHead_RequirementAssignees', compact('assigned_reqrs', 'bin_id', 'requirementbin'));
        }


        public function filteredAndSortedAssignees(Request $request, $bin_id)
        {
            if ($request->ajax()) {
                $query = DB::table('users')
                    ->join('users_profiles', 'users_profiles.user_id', '=', 'users.id')
                    ->join('user_assigned_to_requirement_bins', 'users.id', '=', 'user_assigned_to_requirement_bins.assigned_to')
                    ->join('requirement_bins', 'requirement_bins.id', '=', 'user_assigned_to_requirement_bins.requirement_bin_id')
                    ->join('roles', 'roles.id', '=', 'users.foreign_role_id')
                    ->where('requirement_bins.id', '=', $bin_id)
                    ->select('users.id as user_id', 'users.email as email', 'roles.title as role_type',
                        'user_assigned_to_requirement_bins.review_status as review_status',
                        'user_assigned_to_requirement_bins.compliance_status as compliance_status',
                        'user_assigned_to_requirement_bins.id as id', 'requirement_bins.id as req_bin_id',
                        'users_profiles.first_name', 'users_profiles.last_name');

                if ($request->filter_option) {
                    $filterOption = $request->filter_option;
                    switch ($filterOption) {
                        case 'All':
                            $query = $query;
                            break;
                        case 'Faculty':
                            $query->where('roles.title', $filterOption);
                            break;
                        case 'Director':
                            $query->where('roles.title', $filterOption);
                            break;
                        case 'Staff':
                            $query->where('roles.title', $filterOption);
                            break;
                        case 'Reviewed':
                            $query->where('user_assigned_to_requirement_bins.review_status', $filterOption);
                            break;
                        case 'Pending':
                            $query->where('user_assigned_to_requirement_bins.review_status', $filterOption);
                            break;
                        case 'Completed':
                            $query->where('user_assigned_to_requirement_bins.compliance_status', $filterOption);
                            break;
                        case 'Incomplete':
                            $query->where('user_assigned_to_requirement_bins.compliance_status', $filterOption);
                            break;
                        case 'CPending':
                            $query->where('user_assigned_to_requirement_bins.compliance_status', 'Pending');
                            break;
                        default:
                            break;
                    }
                }

                if ($request->sort_option) {
                    $sortOption = $request->sort_option;
                    switch ($sortOption) {
                        case 'az':
                            $query->orderBy('users_profiles.first_name', 'asc');
                            break;
                        case 'za':
                            $query->orderBy('users_profiles.first_name', 'desc');
                            break;
                        case 'e_az':
                            $query->orderBy('users.email', 'asc');
                            break;
                        case 'e_za':
                            $query->orderBy('users.email', 'desc');
                            break;
                        default:
                            break;
                    }
                }

                $assignees = $query->get();
                return response()->json(['assignees' => $assignees]);
            }
        }


        /**Creating Requirement Bin */
        public function Create_RequirementBin(Request $request): JsonResponse{
            $validator = Validator::make($request->all(), [
                'title' => 'required|unique:requirement_bins',
                'description' => 'max:1000000',
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
            $carbon_deadline = Carbon::createFromFormat('Y-m-d\TH:i', $deadline);
            $formatted_deadline = $carbon_deadline->format('Y-m-d H:i:s');
            $reqbin->deadline = $formatted_deadline;

            $reqbin->created_by =  $userId;

            $today= Carbon::today();
            if($today->format('Y-m-d H:i:s') <= $formatted_deadline)
            {
                $reqbin->status = "Ongoing";
            }
            else{
                $reqbin->status = "Closed";
            }


            if($validator->fails()){
                return response()->json([
                    'success' => false,
                    'message' => 'Validation error',
                    'errors' => $validator->errors(),
                ]);
            }
            else{
                $reqbin->save();
                return response()->json([
                    'success' => true,
                    'message' => 'Requirement Bin successfully created.'
                  ], 200);
            }

        }
        //Delete Requirement Bin
        public function deleteRequirementBins($id)
        {   $user_id = Auth::user()->id;
            $requirementbin = RequirementBin::find($id);
            $requirementbin->is_deleted = true;
            $requirementbin->updated_by = $user_id;
            $requirementbin->save();
            $requirementbin->delete();
            return back()->with('success', 'Requirement Bin deleted successfully!'); /**Alert Message */
        }


        //UPDATE REQUIREMENT BIN
        public function updateRequirementbins(Request $request, $id): JsonResponse{
            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'description' => 'max:1000000',
                'deadline' => 'required|date|after_or_equal:today',
                'status' => 'nullable'
            ]);
            // Get the ID of the logged in user
            $userId = Auth::user()->id;
            $requirementbins = RequirementBin::where('id', $id)
            ->where('is_deleted', false)
            ->where('deleted_at', null)
            ->get();

            foreach( $requirementbins as $requirementbin){
                $bin_title = $requirementbin->title;
                $bin_description = $requirementbin->description;
            }

            $req_bin = RequirementBin::findOrFail($id);
            $req_bin->title = $request->input('title');
            $req_bin->description = $request->input('description');

            //This codes converts the date picker format into datetime format
            $deadlines = trim($request->input('deadline'));
            $carbon_deadline = Carbon::createFromFormat('Y-m-d\TH:i', $deadlines);
            $formatted_deadline = $carbon_deadline->format('Y-m-d H:i:s');
            $req_bin->deadline = $formatted_deadline;

            $req_bin->updated_by =  $userId;
            $today= Carbon::today();
            if($today->format('Y-m-d H:i:s') <= $formatted_deadline)
            {
                $req_bin->status = "Ongoing";
            }
            else{
                $req_bin->status = "Closed";
            }

            if($validator->fails()){
                return response()->json([
                    'success' => false,
                    'message' => 'Validation error',
                    'errors' => $validator->errors(),
                ]);
            }

            else{
                $req_bin->save();
                return response()->json([
                    'success' => true,
                    'message' => 'Requirement Bin updated successfully.'
                  ], 200);
            }
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

