<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Healthcare extends Model
{
    public function ledger(){
        return $this->belongsTo(Ledger::class);
    }
    public function institutype(){
        return $this->belongsTo(Institutype::class);
    }
}
