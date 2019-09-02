<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function qualification(){
        return $this->belongsTo(Qualification::class);
    }

    public function rank(){
        return $this->belongsTo(Rank::class);
    }
    public function empunion(){
        return $this->belongsTo(Empunion::class);
    }
    public function rank(){
        return $this->belongsTo(Rank::class);
    }
    public function rank(){
        return $this->belongsTo(Rank::class);
    }
}
