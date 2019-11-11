<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accountpayable extends Model
{
    protected $fillable=['ledger_id','creditorname','phone','email','amount','narration'];

    public function ledger(){
        return $this->belongsTo(Ledger::class);
    }
}
