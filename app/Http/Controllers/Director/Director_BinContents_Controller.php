<?php

namespace App\Http\Controllers\Director;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;


use App\Models\RequirementBinContent;
use App\Models\RequirementBin;
use Illuminate\Support\Facades\DB;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session; /**For the session to work */

use Brian2694\Toastr\Facades\Toastr;

use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class Director_BinContents_Controller extends Controller
{

    public function show(Request $request, $bin_id){
        $requirementtypes = DB::table('requirement_types')->get();
        $requirement_bin = RequirementBin::where('id', $bin_id)->first();
        $roles = DB::table('roles')->get();

        $requirements = DB::table('requirement_bin_contents')
        ->join('requirement_types', 'requirement_bin_contents.foreign_requirement_types_id', '=', 'requirement_types.id')
        ->join('requirement_bins', 'requirement_bin_contents.foreign_requirement_bins_id', '=', 'requirement_bins.id')
        ->where('requirement_bins.id', '=', $bin_id)
        ->where('requirement_bin_contents.is_deleted', '=', false)
                ->select('requirement_types.title as title', 'requirement_bin_contents.notes as note',
                'requirement_bin_contents.file_format as file_format', 'requirement_bin_contents.id as id',
                'requirement_bin_contents.foreign_requirement_types_id as typeId')
        ->get();

        $deleted_requirements = DB::table('requirement_bin_contents')
        ->join('requirement_types', 'requirement_bin_contents.foreign_requirement_types_id', '=', 'requirement_types.id')
        ->where('requirement_bin_contents.is_deleted', '=', true)
                ->select('requirement_types.title as title', 'requirement_bin_contents.file_format as file_format',
                'requirement_bin_contents.id as id')
        ->get();

        $users = DB::table('users')
        ->leftJoin('roles', 'roles.id', '=', 'users.foreign_role_id')
        ->select('roles.title as role', 'users.email', 'users.status', 'users.id')
        ->get();

        return view('Director/Director_BinContents/Director_BinContents',
        compact('requirementtypes', 'bin_id', 'requirements', 'users', 'roles', 'deleted_requirements', 'requirement_bin'));
    }

    public function filtered_user(Request $request){

        if($request->ajax())
        {
            if($request->types == 'All')
            {
                 $users = DB::table('users')
                ->leftJoin('roles', 'roles.id', '=', 'users.foreign_role_id')
                ->select('roles.title as role', 'users.email as email', 'users.status', 'users.id as id')
                ->get();
            }

            else
            {
                $users = DB::table('users')
                ->leftJoin('roles', 'roles.id', '=', 'users.foreign_role_id')
                ->where('roles.id', '=', $request->types)
                ->select('roles.title as role', 'users.email as email', 'users.status', 'users.id as id')
                ->get();
            }

            return response()->json(['users'=>$users]);
        }

    }

}

