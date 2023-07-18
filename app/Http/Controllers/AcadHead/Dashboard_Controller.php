<?php

namespace App\Http\Controllers\AcadHead;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UsersProfile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Brian2694\Toastr\Facades\Toastr;


class Dashboard_Controller extends Controller
{
    /**Academic Head Dashboard */
    public function dashboard(){


        return view("Academic_head/INTG_AcadHead_Dashboard");
    }

}

