<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersFiles extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'file_name',
        'file_path',

    ];
}
