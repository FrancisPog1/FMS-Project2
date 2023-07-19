<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

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


}
