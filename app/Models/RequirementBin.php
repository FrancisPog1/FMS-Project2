<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RequirementBin extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $incrementing = false; //This fix the bug with the Auth::user()->id code.

    protected $fillable = [
        'id',
        'title',
        'description',
        'deadline',
        'status',
        'is_deleted',
    ];
}
