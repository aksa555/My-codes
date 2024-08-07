<?php

namespace App\Models;

use CodeCoz\AimAdmin\Models\AimAdminUser;

class User extends AimAdminUser
{
    protected $fillable = ['id', 'name', 'email','email_verified_at','password','is_admin','remember_token','created_at','updated_at'];

}
