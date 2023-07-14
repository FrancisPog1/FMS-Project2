<?php

namespace App\Http\Controllers\Director;
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

class Director_DownloadUserFiles_Controller extends Controller
{
    public function downloadFiles($file)
    {

        $file = UsersFiles::findOrFail($file); // Retrieve the file by its ID

        $file_path = storage_path('app/public/uploaded_files/' . $file->file_path);


        if (file_exists($file_path)) {
            return response()->download($file_path, $file->file_name);
        } else {
            // Handle the case when the file does not exist
            return response()->json(['message' => 'File not found'], 404);
        }

    }

}
