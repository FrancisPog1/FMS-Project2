<?php

namespace App\Http\Controllers;

use App\Models\TemporaryFiles;
use App\Models\UserUploadRequirement;
use App\Models\UsersFiles;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
Use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use illuminate\Support\Facades\Validator;


class FacultyUpload_Controller extends Controller
{
    public function uploadFile(Request $request, $requirementID){

        $validator = \Validator::make($request->all(), [
            'file' => 'required'
        ]);

        $user_id = Auth::user()->id;
        $assigned_requirement = UserUploadRequirement::findOrFail($requirementID);


        $temporaryFiles = TemporaryFiles::all();

        if($validator->fails()){
            return back()->with('error', 'Cannot submit, please upload a file first'); /**Alert Message */
        }

        else{

            //This code copy the folders and files from the temporary folder and then paste it to the uploaded_files folder
            foreach($temporaryFiles as $temporaryFile){
                 \Storage::copy('uploaded_files/tmp/' .$temporaryFile->folder . '/' .$temporaryFile->file_name, 'uploaded_files/' .$temporaryFile->folder . '/' .$temporaryFile->file_name);


                // $directory = storage_path('public/storage/uploaded_files/tmp' . $temporaryFile->folder);
                // $files = \Storage::files($directory);



               $UserFiles = new UsersFiles();
               $UserFiles->id = \Str::uuid()->toString();
               $UserFiles->uploaded_by= $user_id;
               $UserFiles->requirement_id = $requirementID;
               $UserFiles->file_name = $temporaryFile->file_name;
               $UserFiles->file_path = $temporaryFile->folder . '/' . $temporaryFile->file_name;
               $UserFiles->save();



                //Delete the temporary files from the path and tempoarary_files table
                \Storage::deleteDirectory('uploaded_files/tmp/'. $temporaryFile->folder);
                $temporaryFile->delete();
            }
            $assigned_requirement->status = "In review";
            $assigned_requirement->submission_date = Carbon::now('Asia/Manila')->format('Y-m-d H:i:s');
            $assigned_requirement->submission_type = "Soft Copy";
            $assigned_requirement->save();
            return back()->with('success', 'Files successfully uploaded'); /**Alert Message */
        }

    }

    public function uploadHardCopy(Request $request): JsonResponse {

        $validator = \Validator::make($request->all(), [
            'submission_date' => 'required'
        ]);

        $requirementID = $request ->requirement_id;
        $user_id = Auth::user()->id;
        $assigned_requirement = UserUploadRequirement::findOrFail($requirementID);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors(),
            ]);
        }

        else{
            $assigned_requirement->status = "In review";
            $assigned_requirement->submission_date = Carbon::now('Asia/Manila')->format('Y-m-d H:i:s');
            $assigned_requirement->submission_type = "Hard Copy";
            $assigned_requirement->uploader_comments = $request ->comments;
            $assigned_requirement->save();
            return response()->json(['success' => true, 'message' => 'The form submitted successfully!'], 200);
        }

    }
}
