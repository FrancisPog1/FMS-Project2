<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersProfile extends Model
{
    use HasFactory;
    public $incrementing = false; //This fix the bug with the Auth::user()->id code.

    protected $primaryKey = 'id';
    protected $keyType = 'uuid';

    protected $fillable = [
        'id',
        'title',
        'description',
        'created_by',
        'updated_by',
        'specialization_id',
        'designation_id',
        'academic_rank_id',
        'faculty_type_id',
        'user_id',
        'house_number',
        'street',
        'barangay',
        'city',
        'province',
        'phone_number',
        'hire_date',
        'birthplace',
        'birthdate',
        'gender',
        'last_name',
        'middle_name',
        'image',
        'first_name',
        'extension_name',
    ];

}
