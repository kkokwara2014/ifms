<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recexpenditure extends Model
{
    public function department(){
        return $this->belongsTo(Department::class);
    }
    public function servicetype(){
        return $this->belongsTo(Servicetype::class);
    }
    public function ledger(){
        return $this->belongsTo(Ledger::class);
    }
    public function employee(){
        return $this->belongsTo(Employee::class);
    }
}
