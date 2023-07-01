<?php

namespace App\Http\Controllers\AcadHead;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\User;


use App\Models\Role;


use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session; /**For the session to work */
use Hash; /**For hashing the password */
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;


class Role_Controller extends Controller
{
    //Creating a Role
    public function Create_Roles(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'title'=>'required|unique:roles',
            'description'=>'max:300'
        ]);

        // Get the user ID of the logged in user
        $userId = Auth::user()->id;

        /**Codes to get the contents of the input field and save it to the database */
        $role = new Role();
        $role->title = $request ->title;
        $role->description = $request ->description;
        $role->created_by = $userId;

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors(),
            ]);
        }
        else {
            $role->save();
            return response()->json(['success' => true, 'message' => 'Role successfully created.'], 200);
        }

    }


    //Deleting Role
    public function deleteRoles($id)
    {   // Find the role by its ID
        $role = Role::find($id);

        // Check if the role exists
        if ($role) {
            // Delete the role
            $role->delete();
            // Redirect to a success page or perform any other actions
            // You can customize thrankis based on your requirements
            return back()->with('success', 'Role deleted successfully');
        }
        // If the role doesn't exist, redirect with an error message
        return back()->with('error', 'Role not found');
    }

        //UPDATE ROLES
        public function updateRoles(Request $request, $id) : JsonResponse
        {
            $validator = Validator::make($request->all(), [
                'title'=>'required|unique:roles',
                'description'=>'max:300'
            ]);

            // Get the user ID of the logged in user
            $userId = Auth::user()->id;

            $role = Role::find($id);
            $role->title = $request->input('title');
            $role->description = $request->input('description');
            $role->updated_by = $userId;

            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation error',
                    'errors' => $validator->errors(),
                ]);
            }
            else {
                $role->save();
                return response()->json(['success' => true, 'message' => 'Role successfully updated.'], 200);
            }
        }

}

