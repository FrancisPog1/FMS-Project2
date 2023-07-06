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

    public function show(){
        $deleted_roles = Role::onlyTrashed()
        ->where('is_deleted', true)
        ->get();

        $roles = Role::where('deleted_at', null)
        ->where('is_deleted', false)
        ->get();

        return view('Academic_head/Admin_Setup/AcadHead_Role/AcadHead_Role',
        compact('deleted_roles', 'roles'));
    }

    public function filteredAndSortedRole(Request $request){
        if ($request->ajax()) {
            $query = Role::whereNull('deleted_at')
                ->where('is_deleted', false);

            if ($request->option) {
                $option = $request->option;
                switch ($option) {
                    case 'az':
                        $query->orderBy('title', 'asc');
                        break;
                    case 'za':
                        $query->orderBy('title', 'desc');
                        break;
                    default:
                        break;
                }
            }

            $roles = $query->get();
            return response()->json(['roles' => $roles]);
        }

    }


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
    {   $user_id = Auth::user()->id;
        $role = Role::find($id);
        $role->is_deleted = true;
        $role->updated_by = $user_id;
        $role->save();
        $role->delete();
        return back()->with('success', 'Role deleted successfully!'); /**Alert Message */
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


    public function restore(Request $request)
    {   $deleted_roles = $request->input('deleted_reqs');

        if ($deleted_roles != null)
        {
            foreach( $deleted_roles as $role_id ) {

                $roles = Role::withTrashed()->findOrFail($role_id);
                $roles->is_deleted = false;
                $roles->save();
                $roles->restore();
            }
            return back()->with('success', 'Role restored successfully!'); /**Alert Message */
        }
        else{
            return back()->with('error', "You didn't selected any of the records to restore!"); /**Alert Message */
        }
    }

        //HARD DELETE Requiremnts
        public function destroy($id)
        {   // Find the role by its ID
            $role = Role::withTrashed()->findOrFail($id);
            $role->forceDelete();

            return back()->with('success', 'Role permanently deleted successfully!'); /**Alert Message */
        }


}

