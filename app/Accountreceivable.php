<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accountreceivable extends Model
{
    public function ledger()
    {
        return $this->belongsTo(Ledger::class);
    }
}
