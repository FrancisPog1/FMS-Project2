<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RequirementBinContent extends Model
{
    use HasFactory, SoftDeletes;
    public $incrementing = false; //This fix the bug with the Auth::user()->id code.

    protected $fillable = [
        'file_format',
        'notes',
        'is_deleted',
    ];
}
