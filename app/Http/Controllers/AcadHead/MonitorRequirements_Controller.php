<?php

namespace App\Http\Controllers\AcadHead;
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

class MonitorRequirements_Controller extends Controller
{
    public function show($user_id, $assigned_bin_id, $req_bin_id)
    {
        $files = UsersFiles::all();

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

        return view('Academic_head/AcadHead_Setup/AcadHead_MonitorRequirements/AcadHead_MonitorRequirements'
        , compact('datas','assigned_bin_id', 'req_bin_id', 'user_id', 'files'));

    }

    public function validateRequirement(Request $request, $id, $req_bin_id, $assigned_bin_id)
    {
        // Get the user ID of the logged in user
        $userId = Auth::user()->id;
        $assigned_bin = UserAssignedToRequirementBins::findOrFail($assigned_bin_id);

       $assigned_requirement_id = UserUploadRequirement::findOrFail($id);
       $assigned_requirement_id->status = $request->input('changeStatus');
       $assigned_requirement_id->acadhead_remarks = $request->input('remarks');
       $assigned_requirement_id->updated_by = $userId;
       $assigned_requirement_id->save();

        //CODES FOR ASSIGNING NEW STATUS TO COMLIANCE STATUS ON user_assigned_to_bin table
        // Check if there are any pending or rejected statuses in UserUploadRequirement
        $hasPendingOrRejected = UserUploadRequirement::where('assigned_to', $assigned_bin->assigned_to)
            ->join('requirement_bin_contents', 'requirement_bin_contents.id', '=', 'user_upload_requirements.foreign_bin_content_id')
            ->join('requirement_bins', 'requirement_bin_contents.foreign_requirement_bins_id', '=', 'requirement_bins.id')
            ->whereIn('user_upload_requirements.status', ['Pending', 'Rejected'])
            ->whereNull('requirement_bin_contents.deleted_at')
            ->where('requirement_bins.id', '=', $req_bin_id)
            ->exists();

        $allApproved = UserUploadRequirement::where('assigned_to', $assigned_bin->assigned_to)
            ->join('requirement_bin_contents', 'requirement_bin_contents.id', '=', 'user_upload_requirements.foreign_bin_content_id')
            ->join('requirement_bins', 'requirement_bin_contents.foreign_requirement_bins_id', '=', 'requirement_bins.id')
            ->where('user_upload_requirements.status', '!=', 'Approved')
            ->whereNull('requirement_bin_contents.deleted_at')
            ->where('requirement_bins.id', '=', $req_bin_id)
            ->doesntExist();

        $records = UserUploadRequirement::where('assigned_to', $assigned_bin->assigned_to)
            ->join('requirement_bin_contents', 'requirement_bin_contents.id', '=', 'user_upload_requirements.foreign_bin_content_id')
            ->whereNull('requirement_bin_contents.deleted_at')
            ->join('requirement_bins', 'requirement_bin_contents.foreign_requirement_bins_id', '=', 'requirement_bins.id')
            ->where('requirement_bins.id', '=', $req_bin_id)
            ->exists();

        if ($records){
            if ($hasPendingOrRejected) {
                $assigned_bin->compliance_status = 'Incomplete';
            } elseif ($allApproved) {
                $assigned_bin->compliance_status = 'Completed';
            }
        }
        else{
            $assigned_bin->compliance_status = 'Pending';
        }

        $assigned_bin->save();

        return back()->with('success', 'The requirement is validated successfully.');

    }

    public function reviewedMark($id, $req_bin_id)
    {
        $userId = Auth::user()->id;
        $assigned_bin = UserAssignedToRequirementBins::findOrFail($id);

        if ($assigned_bin->review_status === "Reviewed") {
            return back()->with('error', 'You already marked this as Reviewed.');
        } else {
            $assigned_bin->review_status = "Reviewed";
            $assigned_bin->reviewed_by = $userId;
            $assigned_bin->updated_by = $userId;
            $assigned_bin->save();

            return back()->with('success', 'Successfully marked as Reviewed.');
        }
    }


}

