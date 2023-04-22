<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session; /**For the session to work */
use Hash; /**For hashing the password */
use Brian2694\Toastr\Facades\Toastr;

class FMSAuthController extends Controller
{
    public function login(){
        return view("auth.login");

    }

    public function add_user(){
        return view("auth.add_user");
    }
    
/**Codes for registration */
    public function registerUser(Request $request){
        /**Codes to validate the input fields of the registration page */
        $request->validate([
            'email'=>'required|email|unique:users',
            'Password'=>'required|min:8|max:20',
            'ConfirmPassword'=>'required|min:8|max:20|same:Password'
        ]);

        /**Codes to get the contents of the input field and save it to the database */
        $user = new User();
        $user->id = Str::uuid()->toString();
        $user->email = $request ->email;
        $user->Password = Hash::make($request ->Password);  
        $res = $user->save();
        if($res){
            return back()->with('success', 'You have created an account!'); /**Alert Message */
        }
        else{
            return back()->with('fail', 'Something Wrong');
        }
    }

/**Codes for login form */
    public function loginUser(Request $request){
        $request->validate([
            'email'=>'required|email|',
            'Password'=>'required|min:8|max:20'
        ]);
        $user = User::where('email', '=', $request->email)->first();
        if($user) {
            if(Hash::check($request->Password, $user->password)){
                $request->Session()->put('loginId', $user->id);
                return redirect('AcadHead_dashboard')->with('success', 'Login Successfull');
            }
            else{
                return back()->with('error', 'Password Not Matches');
            }

        }
        else{
            return back()->with('error', 'The email is not registered');
        }

    }

    /**Academic Head Dashboard */

    public function dashboard(){
        return view("Academic_head.AcadHead_dashboard");
    }

    public function logout(){
        if(Session::has('loginId')){
            Session::pull('loginId');
            return redirect("/");
        }
        else{
            echo "Hindi pumasok";
        }
    }


}
 
