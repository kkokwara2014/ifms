<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mda extends Model
{
    public function departments(){
        return $this->hasMany(Department::class);
    }
    public function revebues(){
        return $this->hasMany(Revenue::class);
    }
    public function salarypayments(){
        return $this->hasMany(Salarypayment::class);
    }
}
