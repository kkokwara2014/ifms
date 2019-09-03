<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    public function employees(){
        return $this->hasMany(Employee::class);
    }
    public function ledgers(){
        return $this->hasMany(Ledger::class);
    }
}
