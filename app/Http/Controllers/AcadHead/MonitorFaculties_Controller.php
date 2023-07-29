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

class MonitorFaculties_Controller extends Controller
{
    public function show()
    {   $user_id = Auth::user()->id;

        $users = DB::table('requirement_bin_contents')
        ->leftJoin('requirement_types', 'requirement_bin_contents.foreign_requirement_types_id', '=', 'requirement_types.id')
        ->leftJoin('requirement_bins', 'requirement_bin_contents.foreign_requirement_bins_id', '=', 'requirement_bins.id')
        ->leftJoin('requirement_categories as RC', 'RC.id', '=', 'requirement_bins.category_id')
         ->join('user_upload_requirements', 'requirement_bin_contents.id', '=', 'user_upload_requirements.foreign_bin_content_id')
         ->leftJoin('users', 'user_upload_requirements.assigned_to', '=', 'users.id')
        //  ->join('user_assigned_to_requirement_bins', 'requirement_bins.id', '=', 'user_assigned_to_requirement_bins.requirement_bin_id')
         ->leftJoin('users_profiles', 'users.id', '=', 'users_profiles.user_id')
         ->leftJoin('users as reviewers', 'user_upload_requirements.reviewed_by', '=', 'reviewers.id') // Left join to get the reviewer's info
         ->leftJoin('users_profiles as reviewer_profiles', 'reviewers.id', '=', 'reviewer_profiles.user_id') // Left join to get the reviewer's profile info
        ->where('requirement_bin_contents.is_deleted', '=', false)
                ->select(
                'requirement_bin_contents.id as id',
                'requirement_bin_contents.foreign_requirement_types_id as typeId',
                'RC.title as category',
                'requirement_types.title as type',
                'requirement_bins.title as requirement_bin',
                'user_upload_requirements.status as status',
                'user_upload_requirements.acadhead_remarks as remarks',
                'user_upload_requirements.submission_date',
                'user_upload_requirements.id as id',
                'users.id as user_id', 'users_profiles.first_name' ,
                'users_profiles.last_name' ,
                'user_upload_requirements.reviewed_at',
                'users_profiles.first_name as first_name', // Alias for users's first name
                'users_profiles.last_name as last_name',
                // 'user_assigned_to_requirement_bins.id as assigned_bin_id', // Alias for users's last name
                'requirement_bins.id as req_bin_id')
        ->distinct()
        ->get();


        foreach ($users as $user) {
            if( $user->submission_date != null){
            $user->submission_date = Carbon::parse($user->submission_date)->format('F d, Y h:i A');
            }

            if( $user->reviewed_at != null){
            $user->reviewed_at = Carbon::parse($user->reviewed_at)->format('F d, Y h:i A');
            }
        }

        return view('Academic_head/AcadHead_Setup/AcadHead_MonitorFaculties/AcadHead_MonitorFaculties'
        , compact('users', 'user_id'));

    }

    public function viewFiles(Request $request)
    {
        $req_bin_id = $request->req_bin_id;
        $type_id   = $request->type_id;
        $user_id    = $request->user_id;

        $files = DB::table('requirement_bins')
        ->join('requirement_bin_contents', 'requirement_bin_contents.foreign_requirement_bins_id', '=', 'requirement_bins.id')
        ->join('requirement_types', 'requirement_types.id', '=', 'requirement_bin_contents.foreign_requirement_types_id')
        ->join('user_upload_requirements', 'user_upload_requirements.foreign_bin_content_id', '=', 'requirement_bin_contents.id')
        ->join('users_files', 'users_files.requirement_id', '=', 'user_upload_requirements.id')

        ->join('users', 'users.id', '=', 'users_files.uploaded_by')
        ->where('requirement_bin_contents.is_deleted', '=', false)
        ->where('requirement_bin_contents.foreign_requirement_bins_id', '=', $req_bin_id)
        ->where('users_files.requirement_id', '=', $type_id)
        ->where('user_upload_requirements.assigned_to', '=', $user_id)
        ->select('users_files.file_name', 'users_files.id as id')
        ->get();

        return response()->json(['files' => $files]);

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

