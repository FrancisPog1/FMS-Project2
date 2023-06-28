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


use Hash; /**For hashing the password */
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Storage;


class Upload_Controller extends Controller
{



    public function uploadFile(Request $request)
    {
        if ($request->hasFile('files')) {
            $files = $request->file('files');

            foreach ($files as $file) {
                // Validate the file if needed

                // Store the file in the desired location
                $path = $file->store('uploaded_files', 'public'); // The second parameter 'public' specifies the disk to store the file

                // Perform any additional processing or save the file information to the database

                // You can also modify the file path if needed
                $modifiedPath = 'D:/Documents/Projects/FMS-Project v6 (Integration)/public/' . $path;
                // Rename or move the file to the desired location
                Storage::disk('public')->move($path, $modifiedPath);
            }

            // Return a success response
            return response()->json(['message' => 'Files uploaded successfully']);
        }

        // Return an error response if no files were uploaded
        return response()->json(['message' => 'No files uploaded'], 400);
    }

}

