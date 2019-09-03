<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orderadv extends Model
{
    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }
    public function ledger(){
        return $this->belongsTo(Ledger::class);
    }
}
