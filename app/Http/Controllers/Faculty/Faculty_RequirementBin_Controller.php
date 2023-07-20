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
            ->join('roles', 'roles.id', '=', 'users.foreign_role_id')
            ->where('users.id', '=', $user_id)
            ->select('RB.title as title', 'RB.description as description',
                    'RB.start_datetime as start_datetime', 'RB.end_datetime as end_datetime', 'RB.status as status',
                    'URB.review_status as review_status', 'RB.created_at as created_at',
                    'URB.compliance_status as compliance_status', 'RB.created_by as created_by',
                    'URB.id as id', 'RB.id as req_bin_id', 'RB.status as status')
            ->get();

            foreach ( $requirement_bins as  $requirement_bin) {
                 $requirement_bin->start_datetime = Carbon::parse( $requirement_bin->start_datetime)->format('F d, Y h:i A');
                 $requirement_bin->end_datetime = Carbon::parse( $requirement_bin->end_datetime)->format('F d, Y h:i A');
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
            ->where('requirement_bin_contents.is_deleted', '=', false)
            ->where('requirement_bin_contents.foreign_requirement_bins_id', '=', $req_bin_id)
            ->where('user_upload_requirements.assigned_to', '=', $user_id)

            ->select('requirement_types.title as type','requirement_bin_contents.notes as notes', 'user_upload_requirements.status as status',
            'user_upload_requirements.acadhead_remarks as remarks', 'requirement_bin_contents.file_format as file_format',
            'user_upload_requirements.id as id')
            ->get();

            $requirementbin = DB::table('requirement_bins as bin')
            ->leftJoin('users', 'users.id', '=' ,'bin.created_by')
            ->where('bin.id', '=',  $req_bin_id)
            ->select('bin.title as bin_title', 'bin.status as bin_status', 'bin.created_by as bin_created_by',
                'bin.created_at as bin_created_at','bin.description as bin_description', 'bin.start_datetime as bin_start_datetime',
                'bin.end_datetime as bin_end_datetime', 'users.email as email')
            ->get();

            foreach ($requirementbin as $bin) {
                $bin->bin_start_datetime = Carbon::parse($bin->bin_start_datetime)->format('F d, Y h:i A');
                $bin->bin_end_datetime = Carbon::parse($bin->bin_end_datetime)->format('F d, Y h:i A');
            }

            return view('Faculty/Faculty_RequirementList/Faculty_RequirementList'
            , compact('datas','assigned_bin_id', 'req_bin_id', 'requirementbin', 'user_id'));

        }

}

