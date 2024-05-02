<?php

namespace App\Http\Controllers\AcadHead;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\User;
Use Carbon\Carbon;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session; /**For the session to work */
use Hash; /**For hashing the password */
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Password;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;


class User_Controller extends Controller
{

    public function show(){

        $roles = DB::table('roles')->get();

        $users = DB::table('users')
        ->leftJoin('users_profiles', 'users_profiles.user_id', '=', 'users.id')
        ->leftJoin('roles', 'roles.id', '=', 'users.foreign_role_id')
        ->where('users.deleted_at', '=', null)
        ->where('users.isDeactivated', '=', false)
        ->select('roles.title as user_role', 'users.email', 'users.status', 'users.id', 'users.status',
        'users_profiles.first_name', 'users_profiles.last_name')
        ->get();

        $deactivated_users = DB::table('users')
        ->leftJoin('users_profiles', 'users_profiles.user_id', '=', 'users.id')
        ->leftJoin('roles', 'roles.id', '=', 'users.foreign_role_id')
        ->where('users.deleted_at', '!=', null)
        ->where('users.isDeactivated', '=', true)
        ->select('roles.title as deact_user_role',
                    'users.email as deact_email',
                    'users.status as deact_status',
                    'users.id as deact_id',
                    'users_profiles.first_name as deact_firstname',
                    'users_profiles.last_name as deact_lastname')
        ->get();

        return view('Academic_head/Admin_Setup/AcadHead_AddUser/AcadHead_AddUser', compact('users','roles', 'deactivated_users'));

    }


    public function deleteUsers($id)
    {   // Find the user by its ID
        $user = User::find($id);

        // Check if the user exists
        if ($user) {
            $user->isDeactivated = true;
            $user->save();
            // Delete the user
            $user->delete();
            // Redirect to a success page or perform any other actions
            // You can customize this based on your requirements
            return back()->with('success', 'User deactivated successfully');
        }
        // If the role doesn't exist, redirect with an error message
        return back()->with('error', 'User not found');
    }

    //UPDATE USER
    public function updateUsers(Request $request, $id): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required',
            'confirmed',
            Password::min(8)     //Require at least 8 characters...
            ->letters()         // Require at least one letter...
            ->mixedCase()        // Require at least one uppercase and one lowercase letter...
            ->numbers()         // Require at least one number...
            ->symbols()         // Require at least one symbol...
            ->uncompromised()], // Ensure the password appears less than 3 times in the same data leak...
        ]);

        // Get the user ID of the logged in user
        $userId = Auth::user()->id;

        $user = User::find($id);
        $user->email = $request->input('email');
        $user->foreign_role_id = $request->input('role');
        $user->password = Hash::make($request ->password);
        $user->updated_by = $userId;


        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors(),
            ]);
        }
        else {
            $user->save();
            return response()->json(['success' => true, 'message' => 'User updated successfully.'], 200);
        }
    }

    public function restore(Request $request)
    {   $deactivated_users = $request->input('users');

        if ($deactivated_users != null)
        {
            foreach( $deactivated_users as $deactivated_user_id ) {

                $user = User::withTrashed()->findOrFail($deactivated_user_id);
                $user->isDeactivated = false;
                $user->save();
                $user->restore();
            }
            return back()->with('success', 'Users reactivated successfully!'); /**Alert Message */
        }
        else{
            return back()->with('error', "You didn't selected any of the records to restore!"); /**Alert Message */
        }
    }


}

