<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ActivityParticipants extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'id',
        'activity_id',
        'participant_id',
        'is_required',
        'assigned by',
        'updated_by',
    ];
}
