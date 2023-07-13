<?php

namespace App\Http\Controllers\Staff;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;


use Brian2694\Toastr\Facades\Toastr;

class Staff_Dashboard_Controller extends Controller
{
    /**Academic Head Dashboard */
    public function dashboard(){
        return view("Staff/Staff_Dashboard");
    }

}

