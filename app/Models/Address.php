<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'address';
    public function admins(){
        return $this->hasMany(Admin::class);
    }
    public function students(){
        return $this->hasMany(Student::class);
    }
}
