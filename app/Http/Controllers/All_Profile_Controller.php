<?php

namespace App\Http\Controllers;

use App\Models\UsersProfile;
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
    public function show(Request $request): View
    {
        return view('/User_Profile/User_Profile', ['page_title' => 'User Profile']);
    }


    public function create(Request $request):  RedirectResponse
    {

        $created_by = Auth::user()->id;
        $id = Str::uuid()->toString();

        $user = User::create([
            'id' => $id,
            'created_by' => $created_by,
            'first_name' => $request->firstname ,
            'last_name' => $request->lastname ,
            'middle_name' => $request->middlename ,
            'extenson_name' => $request->extensionname ,
            'gender' => $request->gender ,
            'birth_date' => $request->birthdate ,
            'birth_place' => $request->birthplace ,
            'email' => $request->email ,
            'phone' => $request->phone ,
            'province' => $request->province ,
            'city' => $request->city ,
            'barangay' => $request->barangay ,
            'street' => $request->street ,
            'house_number' => $request->housenumber ,
            'faculty_type_id' => $request->facultytype ,
            'acadmic_rank_id' => $request->academicrank ,
            'designation_id' => $request->designation ,
            'specialization_id' => $request->specialization ,
            'hire_date' => $request->hiredate ,

        ]);

        return Redirect::back()->with('success', 'Profile created');


    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
