<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contractoradv extends Model
{
    protected $fillable=['ledger_id','contractor_id','amount','purpose','awardedby'];

    public function contractor(){
        return $this->belongsTo(Contractor::class);
    }

    public function ledger(){
        return $this->belongsTo(Ledger::class);
    }
}
