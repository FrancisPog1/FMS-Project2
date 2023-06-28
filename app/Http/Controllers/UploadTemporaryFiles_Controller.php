<?php

namespace App\Http\Controllers;
use App\Models\TemporaryFiles;
use Illuminate\Http\Request;



class UploadTemporaryFiles_Controller extends Controller
{
    public function uploadFile(Request $request){

        if($request->hasFile('file')){
            $file = $request->file('file');
            $fileName = $file->getClientOriginalName();
            $folder = uniqid('file-', true);
            $file->storeAs('uploaded_files/tmp'. $folder, $fileName);

            TemporaryFiles::create([
                'folder' => $folder,
                'file_name' => $fileName,
            ]);

            return $folder;

        }
        return '';

    }
}
