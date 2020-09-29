<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    public function student(){
        return $this->hasOne(Student::class);
    }
    public function vote(){
        return $this->hasMany(vote::class);
    }
    public function SubElectionCandidates(){
        return $this->hasMany(SubElectionCandidate::class);
    }


}
