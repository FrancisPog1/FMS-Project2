<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Barryvdh\DomPDF\Facade\Pdf;

use App\Models\User;
use App\Models\ActivityParticipants;
use Illuminate\Support\Facades\DB;
use App\Models\Activities;
Use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session; /**For the session to work */
use Hash; /**For hashing the password */
use Brian2694\Toastr\Facades\Toastr;

class PDFReports_Controller extends Controller
{
    public function generateReports(){

        $datas = DB::table('requirement_types')
        ->join('requirement_bin_contents', 'requirement_types.id', '=', 'requirement_bin_contents.foreign_requirement_types_id')
        ->join('user_upload_requirements', 'requirement_bin_contents.id', '=', 'user_upload_requirements.foreign_bin_content_id')
        ->join('requirement_bins as bin', 'requirement_bin_contents.foreign_requirement_bins_id', '=', 'bin.id')
        ->join('requirement_categories as category', 'bin.category_id', '=', 'category.id')
        ->join('users', 'user_upload_requirements.assigned_to', '=', 'users.id')
        ->join('users_profiles', 'users.id', '=', 'users_profiles.user_id')
        ->leftJoin('users as reviewers', 'user_upload_requirements.reviewed_by', '=', 'reviewers.id') // Left join to get the reviewer's info
        ->leftJoin('users_profiles as reviewer_profiles', 'reviewers.id', '=', 'reviewer_profiles.user_id') // Left join to get the reviewer's profile info
        ->where('requirement_bin_contents.is_deleted', '=', false)
        ->select('requirement_types.title as requirement',
                'user_upload_requirements.status as status',
                'user_upload_requirements.acadhead_remarks as remarks',
                'user_upload_requirements.submission_date as submission_date',
                'user_upload_requirements.id as id',
                'users.id as user_id',
                'users_profiles.first_name as first_name' ,
                'users_profiles.last_name as last_name' ,
                'user_upload_requirements.submission_type as submission_type',
                'user_upload_requirements.uploader_comments as uploader_comments',
                'user_upload_requirements.reviewed_at',
                'reviewer_profiles.first_name as reviewers_fname', // Alias for reviewer's first name
                'reviewer_profiles.last_name as reviewers_lname',
                'bin.title as bin_title',
                'bin.deadline as bin_deadline',
                'bin.status as bin_status',
                'category.title as category') // Alias for reviewer's last name)
        ->get();

        foreach ($datas as $data) {
            if( $data->submission_date != null){
            $data->submission_date = Carbon::parse($data->submission_date)->format('F d, Y h:i A');
            }

            if( $data->reviewed_at != null){
            $data->reviewed_at = Carbon::parse($data->reviewed_at)->format('F d, Y h:i A');
            }

            if( $data->bin_deadline != null){
                $data->bin_deadline = Carbon::parse($data->bin_deadline)->format('F d, Y h:i A');
            }
        }


        $pdf = Pdf::loadView('pdf-reports.faculty-compliance-reports', ['datas' => $datas])->setPaper('legal', 'landscape');
        return $pdf->download();



    }
}
