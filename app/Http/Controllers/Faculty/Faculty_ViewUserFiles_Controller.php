<?php

namespace App\Http\Controllers\Faculty;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

use App\Models\TemporaryFiles;
use App\Models\UserUploadRequirement;
use App\Models\UsersFiles;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class Faculty_ViewUserFiles_Controller extends Controller
{

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

    public function displayFiles(Request $request)
    {   $file_id= $request->file_id;

        $files = UsersFiles::findOrFail($file_id); // Retrieve the file by its ID

        return response()->json(['files' => $files]);



    }


    public function unsubmit(Request $request, $id) : JsonResponse
    {
        $files = UsersFiles::findOrFail($id); // Retrieve the file by its ID
        $files->forceDelete();

        return response()->json(['success' => true, 'message' => 'File is deleted successfully!'], 200);
    }

}
