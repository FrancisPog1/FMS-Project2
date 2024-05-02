<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsersProfile;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class GetVariable_Controller extends Controller
{
    public function getVariable()
    {
        $user_id = Auth::user()->id;

        $user_details = User::where('id', '=', $user_id)
        ->leftJoin('users_profiles', 'users_profiles.user_id', '=', 'users.id')
        ->leftJoin('roles', 'roles.id', '=', 'users.foreign_role_id')
        ->where('users.deleted_at', '=', null)
        ->select('roles.title as user_role', 'users.email', 'users.status', 'users.id', 'users.status',
        'users_profiles.first_name', 'users_profiles.last_name')
        ->firstOrFail();


        return $user_details;
    }
}
