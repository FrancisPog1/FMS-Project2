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
            ->join('user_assigned_to_requirement_bins', 'users.id', '=', 'user_assigned_to_requirement_bins.assigned_to')
            ->join('requirement_bins', 'requirement_bins.id', '=', 'user_assigned_to_requirement_bins.requirement_bin_id')
            ->join('roles', 'roles.id', '=', 'users.foreign_role_id')
            ->where('users.id', '=', $user_id)
            ->select('requirement_bins.title as title', 'requirement_bins.description as description',
            'requirement_bins.deadline as deadline', 'requirement_bins.status as status',
            'user_assigned_to_requirement_bins.review_status as review_status',
            'user_assigned_to_requirement_bins.compliance_status as compliance_status',
            'user_assigned_to_requirement_bins.id as id', 'requirement_bins.id as req_bin_id')
            ->get();

            foreach ($requirement_bins as $requirement_bin) {
                $requirement_bin->deadline = Carbon::parse($requirement_bin->deadline)->format('F d, Y h:i A');
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

            return view('Faculty/Faculty_RequirementList/Faculty_RequirementList'
            , compact('datas','assigned_bin_id', 'req_bin_id'));

        }

}

