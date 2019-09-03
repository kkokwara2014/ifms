<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expenditure extends Model
{
    public function ledger(){
        return $this->belongsTo(Ledger::class);
    }
    public function budget(){
        return $this->belongsTo(Budget::class);
    }
    public function procurement(){
        return $this->belongsTo(Procurement::class);
    }
    public function salarypayment(){
        return $this->belongsTo(Salarypayment::class);
    }
}
