<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function adminRoles(){
        return $this->hasMany(AdminRole::class);
    }
    public function studentRoles(){
        return $this->hasMany(StudentRole::class);
    }
}
