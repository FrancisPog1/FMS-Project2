<?php

namespace App\Http\Controllers\Staff;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UsersProfile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
class Staff_Dashboard_Controller extends Controller
{
    /**Academic Head Dashboard */
    public function dashboard(){
        // to fetch name from users table
        $user_id = Auth::user()->id;
        $user = UsersProfile::where('user_id', $user_id)->firstOrFail();
        $name = $user->first_name;
        /**
         *  to fetch realtime using carbon laravel
         *  $morning_time = '00:01 AM';
         *  $afternoon_time = '00:01 PM';
         *  $evening_time = '06:00 PM';
         */

        $time_now = Carbon::now('Asia/Manila');//Get the current date

        $h = $time_now->format('H');	//Formatting the date into time only
        // $h = 14;

        // $greeting = '';	//Initialize the greeting variable
        // $morning = $h >= '0' && $h < '12';
        // $afternoon = $h >= '12' && $h < '18' ;
        // $evening = $h >= '18' && $h < '24' ;

        // dd($morning, $afternoon, $evening, $h);

            if ($h >= '0' && $h < '12') {
                $greeting = 'Good Morning,';
            }

            else if ($h >= '12' && $h < '18') {
                $greeting = 'Good Afternoon,';
            }

            else if ($h >= '18' && $h < '24') {
                $greeting = 'Good Evening,';
            }

        return view('Staff/Staff_Dashboard', compact('name','greeting'));
    }

}

