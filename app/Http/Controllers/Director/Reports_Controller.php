<?php

namespace App\Http\Controllers\Director;
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

class Reports_Controller extends Controller
{

    //------------------------------------------------------------------[    REQUIREMENT BIN      ]-------------------------------------------------------------------//
    public function show(){

        $datas = DB::table('requirement_types')
        ->join('requirement_bin_contents', 'requirement_types.id', '=', 'requirement_bin_contents.foreign_requirement_types_id')
        ->join('user_upload_requirements', 'requirement_bin_contents.id', '=', 'user_upload_requirements.foreign_bin_content_id')
        ->join('requirement_bins as bin', 'requirement_bin_contents.foreign_requirement_bins_id', '=', 'bin.id')
        ->join('requirement_categories as category', 'bin.category_id', '=', 'category.id')
        ->join('users', 'user_upload_requirements.assigned_to', '=', 'users.id')
        ->join('users_profiles', 'users.id', '=', 'users_profiles.user_id')
        ->leftJoin('users as reviewers', 'user_upload_requirements.reviewed_by', '=', 'reviewers.id') // Left join to get the reviewer's info
        ->leftJoin('users_profiles as reviewer_profiles', 'reviewers.id', '=', 'reviewer_profiles.user_id') // Left join to get the reviewer's profile info
        ->where('requirement_bin_contents.is_deleted', '=', false)
        ->select('requirement_types.title as requirement',
                'user_upload_requirements.status as status',
                'user_upload_requirements.acadhead_remarks as remarks',
                'user_upload_requirements.submission_date as submission_date',
                'user_upload_requirements.id as id',
                'users.id as user_id',
                'users_profiles.first_name as first_name' ,
                'users_profiles.last_name as last_name' ,
                'user_upload_requirements.submission_type as submission_type',
                'user_upload_requirements.uploader_comments as uploader_comments',
                'user_upload_requirements.reviewed_at',
                'reviewer_profiles.first_name as reviewers_fname', // Alias for reviewer's first name
                'reviewer_profiles.last_name as reviewers_lname',
                'bin.title as bin_title',
                'bin.deadline as bin_deadline',
                'bin.status as bin_status',
                'category.title as category') // Alias for reviewer's last name)
        ->get();

        foreach ($datas as $data) {
            if( $data->submission_date != null){
            $data->submission_date = Carbon::parse($data->submission_date)->format('F d, Y h:i A');
            }

            if( $data->reviewed_at != null){
            $data->reviewed_at = Carbon::parse($data->reviewed_at)->format('F d, Y h:i A');
            }

            if( $data->bin_deadline != null){
                $data->bin_deadline = Carbon::parse($data->bin_deadline)->format('F d, Y h:i A');
            }
        }


        return view('Director/Reports/landing-page'
        , compact('datas'));

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
                $requirementbin->start_datetime = Carbon::parse($requirementbin->start_datetime)->format('F d, Y h:i A');
                $requirementbin->end_datetime = Carbon::parse($requirementbin->end_datetime)->format('F d, Y h:i A');
            }

            return response()->json(['requirementbins' => $requirementbins]);
        }

    }


    //------------------------------------------------------------------[   REQUIREMENT BIN CONTENTS   ]-------------------------------------------------------------------//

    public function show_bin_contents(Request $request, $bin_id){
        $requirement_bin = RequirementBin::where('id', $bin_id)->first();

        $requirements = DB::table('requirement_bin_contents')
        ->join('requirement_types', 'requirement_bin_contents.foreign_requirement_types_id', '=', 'requirement_types.id')
        ->join('requirement_bins', 'requirement_bin_contents.foreign_requirement_bins_id', '=', 'requirement_bins.id')
        ->where('requirement_bins.id', '=', $bin_id)
        ->where('requirement_bin_contents.is_deleted', '=', false)
                ->select('requirement_types.title as title', 'requirement_bin_contents.id as id',
                'requirement_bin_contents.foreign_requirement_types_id as typeId')
        ->get();



        return view('Academic_head/AcadHead_Setup/AcadHead_Reports/BinContents_Reports/BinContents_Reports',
        compact('bin_id', 'requirements', 'requirement_bin'));
    }


    // ------------------------THIS ARE THE CODES FOR THE REQUIREMENT ASSIGNEES PAGE-------------------------- //
    public function show_assignees($bin_id){
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

        return view('Academic_head/AcadHead_Setup/AcadHead_Reports/RequirementAssignees_Reports/RequirementAssignees_Reports', compact('assigned_reqrs', 'bin_id', 'requirementbin'));
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


    //------------------------------------------------------------------[   ACTIVITY PARTICIPANTS   ]-------------------------------------------------------------------//
    public function show_participants($activity_id){
        $participants = DB::table('activities')
        ->join('activity_participants', 'activity_participants.activity_id',  '=', 'activities.id')
        ->join('users', 'users.id', '=', 'activity_participants.participant_id')
        ->join('users_profiles', 'users_profiles.user_id', '=', 'users.id')
        ->join('roles', 'roles.id', '=', 'users.foreign_role_id')
        ->where('activity_participants.activity_id', '=', $activity_id)
        ->select('users.email', 'roles.title as role', 'activity_participants.id as id',
        'users_profiles.first_name', 'users_profiles.last_name')
        ->get();

        $activities = DB::table('activities')
        ->leftJoin('users', 'users.id', '=', 'activities.created_by')
        ->leftJoin('users_profiles', 'users_profiles.user_id', '=', 'activities.created_by')
        ->join('activity_types', 'activity_types.id', '=', 'activities.activity_type_id')
        ->where('activities.id', '=', $activity_id)
        ->select('activities.created_at'
                , 'activities.created_by'
                , 'activities.location'
                , 'activities.description'
                , 'activities.status'
                , 'activities.start_datetime'
                , 'activities.end_datetime'
                , 'activity_types.title as type'
                , 'activities.title'
                , 'users_profiles.first_name'
                , 'users_profiles.last_name'
                )
        ->get();

        foreach ($activities as $activity) {
            $activity->start_datetime = Carbon::parse($activity->start_datetime)->format('F d, Y h:i A');
            $activity->end_datetime = Carbon::parse($activity->end_datetime)->format('F d, Y h:i A');
            $activity->created_at = Carbon::parse($activity->created_at)->format('F d, Y h:i A');
        }

        $roles = DB::table('roles')->get();

        $users = DB::table('users')
        ->leftJoin('users_profiles', 'users_profiles.user_id', '=', 'users.id')
        ->leftJoin('roles', 'roles.id', '=', 'users.foreign_role_id')
        ->select('roles.title as role', 'users.email', 'users.id',
        'users_profiles.first_name', 'users_profiles.last_name')
        ->get();

        return view('Academic_head/AcadHead_Setup/AcadHead_Reports/ActivitiesParticipants_Reports/ActivitiesParticipants_Reports',

        compact('participants', 'roles', 'users', 'activity_id', 'activities'));

    }

}

