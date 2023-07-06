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

use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;


class User_Controller extends Controller
{



    public function show(){

        $roles = DB::table('roles')->get();

        $users = DB::table('users')
        ->leftJoin('roles', 'roles.id', '=', 'users.foreign_role_id')
        ->where('users.deleted_at', '=', null)
        ->select('roles.title as user_role', 'users.email', 'users.status', 'users.id', 'users.status')
        ->get();

        return view('Academic_head/Admin_Setup/AcadHead_AddUser/AcadHead_AddUser', compact('users','roles'));

    }


    public function deleteUsers($id)
    {   // Find the user by its ID
        $user = User::find($id);

        // Check if the user exists
        if ($user) {
            // Delete the user
            $user->delete();
            // Redirect to a success page or perform any other actions
            // You can customize this based on your requirements
            return back()->with('success', 'User deleted successfully');
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

    public function filteredAndSortedUser(Request $request)
    {
        if ($request->ajax()) {
            $query = DB::table('users')
                ->join('roles', 'roles.id', '=', 'users.foreign_role_id')
                ->where('users.deleted_at','=', null)
                ->select('users.id as user_id', 'users.email as email', 'roles.title as role_type', 'users.status as status'
    );
            if ($request->filter_option) {
                $filterOption = $request->filter_option;
                switch ($filterOption) {
                    case 'All':
                        $query = $query;
                        break;
                    case 'Academic Head':
                        $query->where('roles.title', $filterOption);
                        break;
                    case 'Faculty':
                        $query->where('roles.title', $filterOption);
                        break;
                    case 'Director':
                        $query->where('roles.title', $filterOption);
                        break;
                    case 'Staff':
                        $query->where('roles.title', $filterOption);
                        break;
                    case 'Active':
                        $query->where('users.status', $filterOption);
                        break;
                    case 'Inactive':
                        $query->where('users.status', $filterOption);
                        break;
                    default:
                        break;
                }
            }

            if ($request->sort_option) {
                $sortOption = $request->sort_option;
                switch ($sortOption) {
                    case 'All':
                        $query = $query;
                        break;
                    // case 'az':
                    //     $query->orderBy('users.name', 'asc');
                    //     break;
                    // case 'za':
                    //     $query->orderBy('users.name', 'desc');
                    //     break;
                    case 'e_az':
                        $query->orderBy('users.email', 'asc');
                        break;
                    case 'e_za':
                        $query->orderBy('users.email', 'desc');
                        break;
                    case 'r_az':
                        $query->orderBy('roles.title', 'asc');
                        break;
                    case 'r_za':
                        $query->orderBy('roles.title', 'desc');
                        break;
                    default:
                        break;
                }
            }

            $users = $query->get();
            return response()->json(['users' => $users]);
        }
    }


}

