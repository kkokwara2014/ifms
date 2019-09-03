<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empunion extends Model
{
    public function employees(){
        return $this->hasMany(Employee::class);
    }
}
