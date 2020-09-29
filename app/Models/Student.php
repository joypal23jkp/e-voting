<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    public function admins(){
        return $this->hasOne(Admin::class);
    }
    public function candidates(){
        return $this->hasOne(Candidate::class);
    }
    public function address(){
        return $this->hasOne(Address::class);
    }
    public function vote(){
        return $this->hasMany(Vote::class);
    }
    public function roles(){
        return $this->belongsToMany(Role::class, 'student_roles');
    }
}
