<?php

namespace App\Http\Controllers\AcadHead;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;



use App\Models\TemporaryFiles;
use App\Models\UserUploadRequirement;
use App\Models\UsersFiles;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ViewUserFiles_Controller extends Controller
{

    public function viewFiles()
    {
        $files = UsersFiles::all();

        // return view('Academic_head/AcadHead_Setup/AcadHead_MonitorRequirements/AcadHead_MonitorRequirements', compact('files'));

        return view('Academic_head.AcadHead_Setup.AcadHead_MonitorRequirements.AcadHead_MonitorRequirements', compact('files'));

    }

}
