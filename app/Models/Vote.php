<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    public function students(){
        return $this->hasOne(Student::class);
    }
    public function admins(){
        return $this->hasone(Admin::class);
    }
    public function elections(){
        return $this->hasOne(Election::Class);
    }
    public function candidates(){
        return $this->hasone(Candidate::class);
    }           
}
