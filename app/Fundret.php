<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fundret extends Model
{
    public function employee(){
        return $this->belongsTo(Employee::class);
    }

    public function ledger(){
        return $this->belongsTo(Ledger::class);
    }
}
