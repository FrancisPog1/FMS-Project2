<?php

namespace App\Http\Controllers;

use App\Models\UsersProfile;
use App\Models\User;
use App\Models\Specialization;
use App\Models\Designation;
use App\Models\AcademicRank;
use App\Models\FacultyType;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Str;


class All_Profile_Controller extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function show(): View
    {
        $user_id = Auth::user()->id;
        $user = User::findOrFail($user_id);
        $email = $user->email;

        $user_profile = UsersProfile::where('user_id', '=', $user_id)
        ->firstOrFail();
        $profile_id = $user_profile->id;

        $role = DB::table('roles')
        ->join('users', 'users.foreign_role_id', '=', 'roles.id')
        ->where('users.id', '=', $user_id)
        ->select('roles.title')
        ->value('roles.title');

        $specializations = Specialization::where('deleted_at', null)
        ->where('is_deleted', false)
        ->get();

        $designations = Designation::where('deleted_at', null)
        ->where('is_deleted', false)
        ->get();

        $acad_ranks = AcademicRank::where('deleted_at', null)
        ->where('is_deleted', false)
        ->get();

        $faculty_types = FacultyType::where('deleted_at', null)
        ->where('is_deleted', false)
        ->get();

        return view('My_Profile/My_Profile',
        compact('user_id','email', 'role' ,'user_profile', 'designations', 'specializations', 'acad_ranks', 'faculty_types', 'profile_id'));
    }


    public function update(Request $request, $profile_id):  RedirectResponse
    {

        $updated_by = Auth::user()->id;
        $user_profile = UsersProfile::findOrFail($profile_id);



        // $user_profile->updated_by = $updated_by;
        // $user_profile->first_name = $request->firstname;
        // $user_profile->last_name=  $request->lastname;
        // $user_profile->middle_name= $request->middlename;
        // $user_profile->extension_name= $request->extensionname;
        // $user_profile->gender = $request->gender ;
        // $user_profile->birthdate = $request->birthdate ;
        // $user_profile->birthplace= $request->birthplace;
        // // $user_profile->email = $request->email ;
        // $user_profile->phone_number = $request->phone;
        // $user_profile->province =  $request->province;
        // $user_profile->city = $request->city ;
        // $user_profile->barangay = $request->barangay;
        // $user_profile->street = $request->street;
        // $user_profile->house_number = $request->housenumber ;
        // $user_profile->faculty_type_id =  $request->facultytype;
        // $user_profile->academic_rank_id = $request->academicrank;
        // $user_profile->designation_id =  $request->designation;
        // $user_profile->specialization_id = $request->specialization;
        // $user_profile->hire_date = $request->hiredate;

        // $res = $user_profile->save();

        // if($res)
        // {
        //     return Redirect::back()->with('success', 'Profile Updated Successfully');

        // }

        // else
        // {
        //     return Redirect::back()->with('error', 'There is an error');

        // }


        $user_profile->update([
            'updated_by' => $updated_by,
            'first_name' => $request->firstname ,
            'last_name' => $request->lastname ,
            'middle_name' => $request->middlename ,
            'extension_name' => $request->extensionname ,
            'gender' => $request->gender ,
            'birthdate' => $request->birthdate ,
            'birthplace' => $request->birthplace ,
            'email' => $request->email ,
            'phone_number' => $request->phone ,
            'province' => $request->province ,
            'city' => $request->city ,
            'barangay' => $request->barangay ,
            'street' => $request->street ,
            'house_number' => $request->housenumber ,
            'faculty_type_id' => $request->facultytype ,
            'academic_rank_id' => $request->academicrank ,
            'designation_id' => $request->designation ,
            'specialization_id' => $request->specialization ,
            'hire_date' => $request->hiredate ,

        ]);

        return Redirect::back()->with('success', 'Profile Updated Successfully');

    }

    /**
     * Update the user's profile information.
     */
    // public function update(ProfileUpdateRequest $request): RedirectResponse
    // {
    //     $request->user()->fill($request->validated());

    //     if ($request->user()->isDirty('email')) {
    //         $request->user()->email_verified_at = null;
    //     }

    //     $request->user()->save();

    //     return Redirect::route('profile.edit')->with('status', 'profile-updated');
    // }

    /**
     * Delete the user's account.
     */

}
