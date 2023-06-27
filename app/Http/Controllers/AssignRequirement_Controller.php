<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\UserUploadRequirement;
use App\Models\RequirementBinContent;
use App\Models\UserAssignedToRequirementBins;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session; /**For the session to work */
use Hash; /**For hashing the password */
use Brian2694\Toastr\Facades\Toastr;

class AssignRequirement_Controller extends Controller
{
    public function assign_to_user(Request $request, $bin_id)
    {
             $res=0;
            $userId = Auth::user()->id;

            //Assigning the contents of the requirement bin to the user
            //This is for the insertion of data to users_upload_requirenments
            $contents = RequirementBinContent::where('is_deleted', 0)
            ->where('foreign_requirement_bins_id', '=', $bin_id)
            ->get();
            $users = $request->input('users');


            if(count($contents) != 0)
            {
                if($users != null)
                {
                    foreach ($users as $user) {
                        foreach ($contents as $content) {
                            $assign_Requirement = new UserUploadRequirement();
                            $assign_Requirement->id = Str::uuid()->toString();
                            $assign_Requirement->assigned_to = $user;
                            $assign_Requirement->foreign_bin_content_id = $content->id;
                            $assign_Requirement->assigned_by=  $userId;

                            // Check if the user is already assigned to a requirement_bin_content
                            $user_is_assigned = UserUploadRequirement::where('assigned_to', $user)
                            ->where('foreign_bin_content_id',  $content->id)
                            ->exists();

                            if ($user_is_assigned) {
                                // The user is already assigned, so skip this iteration
                                continue;
                            }

                            $res = $assign_Requirement->save();
                        }
                    }

                     //And this is for assigning the requirement bin to the user.
                    //This is for the insertion of data to user_assigned_to_requirement_bins table
                    foreach ($users as $user)
                    {
                        $assign_Bin = new UserAssignedToRequirementBins();
                        $assign_Bin->id = Str::uuid()->toString();
                        $assign_Bin->assigned_to = $user;
                        $assign_Bin->requirement_bin_id = $bin_id;
                        $assign_Bin->assigned_by=  $userId;

                        // Check if the user is already assigned to a requirement_bin_content
                        $user_is_assigned = UserAssignedToRequirementBins::where('assigned_to', $user)
                        ->where('requirement_bin_id', $bin_id)
                        ->exists();

                        if ($user_is_assigned) {
                            // The user is already assigned, so skip this iteration
                            continue;
                        }

                        $res = $assign_Bin->save();
                    }

                    if ($res) {
                        return back()->with('success', 'Requirement Assigned successfully!');
                    } else {
                        return back()->with('error', 'The requirements are already assigned to the user/s');
                    }
                }

                else
                {
                    return back()->with('error', 'Please assign a user/s to the requirement first');
                }

            }

            else
            {
                return back()->with('error', 'Please add requirements first before assigning the requirement bin to the users');
            }
    }
}
