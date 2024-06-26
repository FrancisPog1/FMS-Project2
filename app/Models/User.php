<?php

namespace App\Models;
use App\Models\RequirementBin;
use App\Models\Activities;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\UsersProfile;

class User extends Model implements Authenticatable
{
    use HasFactory;
    use SoftDeletes;
    public $incrementing = false; //This fix the bug with the Auth::user()->id code.

    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $primaryKey = 'id';
    protected $keyType = 'uuid';

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function getAuthIdentifierName()
    {
        return 'id';
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($token)
    {
        $this->remember_token = $token;
    }


    public function profile(){
        return $this->hasOne(UsersProfile::class);
    }


    public function requirementbin(){
        return $this->hasMany(RequirementBin::class, 'created_by');
    }

    public function activities(){
        return $this->hasMany(Activities::class, 'created_by');
    }

}
