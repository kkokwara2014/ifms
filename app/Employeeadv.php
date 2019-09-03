<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employeeadv extends Model
{
    public function employee(){
        return $this->belongsTo(Employee::class);
    }
}
