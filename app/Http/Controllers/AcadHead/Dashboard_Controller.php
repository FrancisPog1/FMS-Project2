<?php

namespace App\Http\Controllers\AcadHead;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UsersProfile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;


class Dashboard_Controller extends Controller
{

    public function dashboard(){
        // to fetch name from users table
        $user_id = Auth::user()->id;
        $user = UsersProfile::where('user_id', $user_id)->firstOrFail();
        $name = $user->first_name;

        // to fetch realtime using carbon laravel
        $morning_time = '12:00 AM';
        $afternoon_time = '12:00 PM';
        $evening_time = '06:00 PM';

        $now = Carbon::now();//Get the current date
        $time_now = $now->format('g:i A');	//Formatting the date into time only

        $greeting = '';	//Initialize the greeting variable

        if ($time_now >= $morning_time && $time_now < $afternoon_time) {
        $greeting = 'Good Morning,';
        } else if ($time_now >= $afternoon_time && $time_now < $evening_time) {
        $greeting = 'Good Afternoon,';
        } else {
        $greeting = 'Good Evening,';
        }




        return view('Academic_head/INTG_AcadHead_Dashboard', compact('name','greeting'));
    }
/**Academic Head Dashboard
    public function dashboard(){
        return view("Academic_head/INTG_AcadHead_Dashboard");
    }*/


}

