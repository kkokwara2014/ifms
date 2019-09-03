<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Revenue extends Model
{
    public function ledger(){
        return $this->belongsTo(Ledger::class);
    }
    public function mda(){
        return $this->belongsTo(Mda::class);
    }
    
}
