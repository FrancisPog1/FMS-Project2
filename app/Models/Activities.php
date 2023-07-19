<?php

namespace App\Models;

use App\Models\ActivityType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Activities extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $primaryKey = 'id';
    protected $keyType = 'uuid';
    public $incrementing = false; //This fix the bug with the Auth::user()->id code.

}
