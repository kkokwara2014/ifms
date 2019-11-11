<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Revenue extends Model
{

    protected $fillable=['revnumber','mda_id','amount','narration','revtype','collectorname','collectorphone','ledger_id'];

    public function ledger(){
        return $this->belongsTo(Ledger::class);
    }
    public function mda(){
        return $this->belongsTo(Mda::class);
    }
    
}
