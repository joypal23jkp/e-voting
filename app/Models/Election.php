<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Election extends Model
{
    public function admins(){
        return $this->hasone(Admin::class);
    }
    public function vote(){
        return $this->hasMany(vote::class);
    }
    public function electionCandidates(){
        return $this->hasMany(SubElectionCandidate::class);
    }
    public function subElections(){
        return $this->hasMany(Election::Class, 'election_id');
    }
}
