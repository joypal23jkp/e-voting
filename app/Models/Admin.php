<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $guard = 'admin';

    protected $fillable = [
        'full_name', 'email', 'password', 'phone_no', 'national_id', 'academic_id', 'date_of_birth', 'address_id'
    ];
    public function adminRoles(){
        return $this->hasMany(AdminRole::class);
    }
    public function students(){
        return $this->hasMany(Student::class);
    }
    public function address(){
        return $this->hasOne(Address::class);
    }
    public function votes(){
        return $this->hasMany(Vote::class);
    }
    public function election(){
        return $this->hasMany(Election::class);
    }
}
