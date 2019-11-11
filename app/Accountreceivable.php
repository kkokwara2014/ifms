<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accountreceivable extends Model
{
    protected $fillable=['ledger_id','customername','phone','email','amount','narration'];

    public function ledger()
    {
        return $this->belongsTo(Ledger::class);
    }
}
