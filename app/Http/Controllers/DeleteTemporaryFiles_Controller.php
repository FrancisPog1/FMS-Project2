<?php

namespace App\Http\Controllers;
use App\Models\TemporaryFiles;
use illuminate\Support\Facades\Storage;

class DeleteTemporaryFiles_Controller extends Controller
{
    //

    public function deleteFile(){
        $temporaryFile= TemporaryFiles::where('folder', request()->getContent())->first();

        if($temporaryFile){
            \Storage::deleteDirectory('uploaded_files/tmp/'. $temporaryFile->folder);
            $temporaryFile->delete();
        }
        return response()->noContent();
    }
}
