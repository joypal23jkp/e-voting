<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminRole extends Model
{
    public function roles(){
        return $this->hasone(Role::class);
    }
    public function admins(){
        return $this->hasone(Admin::class);
    }
}
