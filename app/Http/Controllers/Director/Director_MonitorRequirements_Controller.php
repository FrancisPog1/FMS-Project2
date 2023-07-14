<?php

namespace App\Http\Controllers\Director;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\UserUploadRequirement;
use App\Models\RequirementBinContent;
use App\Models\UserAssignedToRequirementBins;
use Illuminate\Support\Facades\DB;
use App\Models\UsersFiles;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session; /**For the session to work */
use Hash; /**For hashing the password */
use Brian2694\Toastr\Facades\Toastr;

class Director_MonitorRequirements_Controller extends Controller
{
    public function show($user_id, $assigned_bin_id, $req_bin_id)
    {
        $datas = DB::table('requirement_types')
        ->join('requirement_bin_contents', 'requirement_types.id', '=', 'requirement_bin_contents.foreign_requirement_types_id')
        ->join('user_upload_requirements', 'requirement_bin_contents.id', '=', 'user_upload_requirements.foreign_bin_content_id')
        ->join('users', 'user_upload_requirements.assigned_to', '=', 'users.id')
        ->where('requirement_bin_contents.is_deleted', '=', false)
        ->where('requirement_bin_contents.foreign_requirement_bins_id', '=', $req_bin_id)
        ->where('user_upload_requirements.assigned_to', '=', $user_id)

        ->select('requirement_types.title as type', 'requirement_bin_contents.notes as notes', 'user_upload_requirements.status as status',
        'user_upload_requirements.acadhead_remarks as remarks', 'requirement_bin_contents.file_format as file_format',
        'user_upload_requirements.id as id', 'users.id as user_id')
        ->get();

        return view('Director/Director_MonitorRequirements/Director_MonitorRequirements'
        , compact('datas','assigned_bin_id', 'req_bin_id', 'user_id'));

    }

}

