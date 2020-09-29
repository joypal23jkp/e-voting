<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ElectionCandidate extends Model
{
    public function candidates(){
        return $this->hasone(Candidate::class);
    }
    public function elections(){
        return $this->hasOne(Election::Class);
    }
}
