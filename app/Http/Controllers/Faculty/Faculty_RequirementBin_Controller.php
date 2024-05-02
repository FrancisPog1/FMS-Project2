<?php

namespace App\Http\Controllers\Faculty;
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

class Faculty_RequirementBin_Controller extends Controller
{

        public function show(){
            $user_id = Auth::user()->id;

            $requirement_bins = DB::table('users')
            ->join('user_assigned_to_requirement_bins as URB', 'users.id', '=', 'URB.assigned_to')
            ->join('requirement_bins as RB', 'RB.id', '=', 'URB.requirement_bin_id')
            ->leftJoin('requirement_categories as cat', 'cat.id', '=' ,'RB.category_id')
            ->join('roles', 'roles.id', '=', 'users.foreign_role_id')
            ->where('users.id', '=', $user_id)
            ->select('RB.title as title', 'RB.description as description',
                    'RB.deadline as deadline', 'RB.status as status',
                    'URB.review_status as review_status', 'RB.created_at as created_at',
                    'URB.compliance_status as compliance_status', 'RB.created_by as created_by',
                    'URB.id as id', 'RB.id as req_bin_id', 'RB.status as status', 'cat.title as category')
            ->get();

            foreach ( $requirement_bins as  $requirement_bin) {
                 $requirement_bin->deadline = Carbon::parse( $requirement_bin->deadline)->format('F d, Y h:i A');
                 $requirement_bin->created_at = Carbon::parse( $requirement_bin->created_at)->format('F d, Y h:i A');
            }

            return view('Faculty/Faculty_RequirementBin/Faculty_RequirementBin', compact('requirement_bins'));

        }

        public function show_requirements($assigned_bin_id, $req_bin_id)
        {
            $user_id = Auth::user()->id;

            $datas = DB::table('requirement_types')
            ->join('requirement_bin_contents', 'requirement_types.id', '=', 'requirement_bin_contents.foreign_requirement_types_id')
            ->join('user_upload_requirements', 'requirement_bin_contents.id', '=', 'user_upload_requirements.foreign_bin_content_id')
            ->join('users', 'user_upload_requirements.assigned_to', '=', 'users.id')
            ->join('users_profiles', 'users.id', '=', 'users_profiles.user_id')
            ->leftJoin('users as reviewers', 'user_upload_requirements.reviewed_by', '=', 'reviewers.id') // Left join to get the reviewer's info
            ->leftJoin('users_profiles as reviewer_profiles', 'reviewers.id', '=', 'reviewer_profiles.user_id') // Left join to get the reviewer's profile info
            ->where('requirement_bin_contents.is_deleted', '=', false)
            ->where('requirement_bin_contents.foreign_requirement_bins_id', '=', $req_bin_id)
            ->where('user_upload_requirements.assigned_to', '=', $user_id)
            ->select(
                'requirement_types.title as type',
                'user_upload_requirements.status as status',
                'user_upload_requirements.acadhead_remarks as remarks',
                'user_upload_requirements.submission_date',
                'user_upload_requirements.id as id',
                'user_upload_requirements.reviewed_at',
                'reviewer_profiles.first_name as first_name', // Alias for reviewer's first name
                'reviewer_profiles.last_name as last_name' // Alias for reviewer's last name
            )
            ->get();

            foreach ($datas as $data) {
                if( $data->submission_date != null){
                $data->submission_date = Carbon::parse($data->submission_date)->format('F d, Y h:i A');
                }

                if( $data->reviewed_at != null){
                $data->reviewed_at = Carbon::parse($data->reviewed_at)->format('F d, Y h:i A');
                }
            }

            $requirementbin = DB::table('requirement_bins as bin')
            ->leftJoin('users', 'users.id', '=' ,'bin.created_by')
            ->where('bin.id', '=',  $req_bin_id)
            ->select('bin.title as bin_title',
                'bin.status as bin_status',
                'bin.created_by as bin_created_by',
                'bin.created_at as bin_created_at',
                'bin.description as bin_description',
                'bin.deadline as deadline',
                'users.email as email')
            ->get();

            foreach ($requirementbin as $bin) {
                $bin->deadline = Carbon::parse($bin->deadline)->format('F d, Y h:i A');
                $bin->bin_created_at = Carbon::parse($bin->bin_created_at)->format('F d, Y h:i A');
            }

            return view('Faculty/Faculty_RequirementList/landing-page'
            , compact('datas','assigned_bin_id', 'req_bin_id', 'requirementbin', 'user_id'));

        }

}

