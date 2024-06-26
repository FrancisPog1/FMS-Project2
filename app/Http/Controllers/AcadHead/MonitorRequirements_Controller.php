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
Use Carbon\Carbon;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

class MonitorRequirements_Controller extends Controller
{
    public function show($user_id, $assigned_bin_id, $req_bin_id)
    {
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

        ->select('requirement_types.title as type',
                'user_upload_requirements.status as status',
                'user_upload_requirements.acadhead_remarks as remarks',
                'user_upload_requirements.submission_date',
                'user_upload_requirements.id as id',
                'users.id as user_id', 'users_profiles.first_name' ,
                'users_profiles.last_name' ,
                'user_upload_requirements.reviewed_at',
                'reviewer_profiles.first_name as first_name', // Alias for reviewer's first name
                'reviewer_profiles.last_name as last_name') // Alias for reviewer's last name)
        ->get();

        foreach ($datas as $data) {
            if( $data->submission_date != null){
            $data->submission_date = Carbon::parse($data->submission_date)->format('F d, Y h:i A');
            }

            if( $data->reviewed_at != null){
            $data->reviewed_at = Carbon::parse($data->reviewed_at)->format('F d, Y h:i A');
            }
        }

        return view('Academic_head/AcadHead_Setup/AcadHead_MonitorRequirements/AcadHead_MonitorRequirements'
        , compact('datas','assigned_bin_id', 'req_bin_id', 'user_id'));

    }

    public function monitor_faculties()
    {




    }


    public function reject(Request $request, $id, $req_bin_id, $assigned_bin_id): JsonResponse
    {
        // Get the user ID of the logged in user
        $userId = Auth::user()->id;
        $assigned_bin = UserAssignedToRequirementBins::findOrFail($assigned_bin_id);
       $assigned_requirement_id = UserUploadRequirement::findOrFail($id);
       $assigned_requirement_id->status = "Rejected";
       $assigned_requirement_id->reviewed_by = $userId;
       $assigned_requirement_id->reviewed_at = Carbon::now('Asia/Manila')->format('Y-m-d H:i:s');
       $assigned_requirement_id->acadhead_remarks = $request->remarks;
       $assigned_requirement_id->save();


       if ($assigned_bin->review_status != "Reviewed") {
        $assigned_bin->review_status = "Reviewed";
        $assigned_bin->updated_by = $userId;
        $assigned_bin->save();
        }

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
        return response()->json(['success' => true, 'message' => 'The requirement is validated successfully.'], 200);
    }


    public function approve(Request $request, $id, $req_bin_id, $assigned_bin_id): JsonResponse
    {
        // Get the user ID of the logged in user
        $userId = Auth::user()->id;
        $assigned_bin = UserAssignedToRequirementBins::findOrFail($assigned_bin_id);

       $assigned_requirement_id = UserUploadRequirement::findOrFail($id);
       $assigned_requirement_id->status = "Approved";
       $assigned_requirement_id->acadhead_remarks = $request->remarks;
       $assigned_requirement_id->reviewed_by = $userId;
       $assigned_requirement_id->reviewed_at = Carbon::now('Asia/Manila')->format('Y-m-d H:i:s');
       $assigned_requirement_id->save();


       if ($assigned_bin->review_status != "Reviewed") {
        $assigned_bin->review_status = "Reviewed";
        $assigned_bin->updated_by = $userId;
        $assigned_bin->save();
        }

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
        return response()->json(['success' => true, 'message' => 'The requirement is validated successfully.'], 200);

    }




}

