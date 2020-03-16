<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    public $table = "user";
    protected $primaryKey = 'id_user';
    protected $fillable = ['nama', 'username', 'password'];
    protected $hidden = ['password'];
}
