<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accountpayable extends Model
{
    public function ledger(){
        return $this->belongsTo(Ledger::class);
    }
}
