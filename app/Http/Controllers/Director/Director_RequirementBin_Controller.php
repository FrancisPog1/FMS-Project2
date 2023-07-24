<?php

namespace App\Http\Controllers\Director;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\DB;
use App\Models\RequirementBin;
Use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session; /**For the session to work */
use Brian2694\Toastr\Facades\Toastr;

use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class Director_RequirementBin_Controller extends Controller
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

        return view('Director/Director_RequirementBin/Director_RequirementBin',
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
            ->select('users.id as user_id',
                        'users.email as email',
                        'roles.title as role_type',
                        'user_bins.review_status as review_status',
                        'user_bins.compliance_status as compliance_status',
                        'user_bins.id as id',
                        'bin.id as req_bin_id',
                        'users_profiles.first_name',
                        'users_profiles.last_name')
            ->get();

            $requirementbin = DB::table('requirement_bins as bin')
            ->leftJoin('users', 'users.id', '=' ,'bin.created_by')
            ->leftJoin('users_profiles as UP', 'UP.user_id', '=' ,'bin.created_by')

            ->where('bin.id', '=', $bin_id)
            ->select('bin.title as bin_title',
                        'bin.status as bin_status',
                        'bin.created_by as bin_created_by',
                        'bin.created_at as bin_created_at',
                        'bin.description as bin_description',
                        'bin.deadline',
                        'UP.first_name',
                        'UP.last_name')
            ->get();

            foreach ($requirementbin as $bin) {
                $bin->deadline = Carbon::parse($bin->deadline)->format('F d, Y h:i A');
                $bin->bin_created_at = Carbon::parse($bin->bin_created_at)->format('F d, Y h:i A');
            }

            return view('Director/Director_RequirementAssignees/Director_RequirementAssignees',
            compact('assigned_reqrs', 'bin_id', 'requirementbin'));
        }


        public function filteredAndSortedAssignees(Request $request, $bin_id)
        {
            if ($request->ajax()) {
                $query = DB::table('users')
                    ->join('user_assigned_to_requirement_bins', 'users.id', '=', 'user_assigned_to_requirement_bins.assigned_to')
                    ->join('requirement_bins', 'requirement_bins.id', '=', 'user_assigned_to_requirement_bins.requirement_bin_id')
                    ->join('roles', 'roles.id', '=', 'users.foreign_role_id')
                    ->where('requirement_bins.id', '=', $bin_id)
                    ->select('users.id as user_id', 'users.email as email', 'roles.title as role_type',
                        'user_assigned_to_requirement_bins.review_status as review_status',
                        'user_assigned_to_requirement_bins.compliance_status as compliance_status',
                        'user_assigned_to_requirement_bins.id as id', 'requirement_bins.id as req_bin_id');

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
                            $query->orderBy('users.name', 'asc');
                            break;
                        case 'za':
                            $query->orderBy('users.name', 'desc');
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


}

