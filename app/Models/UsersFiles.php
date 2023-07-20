<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UsersFiles extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'id',
        'file_name',
        'file_path',

    ];
}
