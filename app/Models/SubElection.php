<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubElection extends Model
{
    public function elections(){
        return $this->belongsTo(Election::Class);
    }
}
