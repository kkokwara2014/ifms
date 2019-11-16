<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Healthcare extends Model
{

    protected $fillable=['institutype','ledger_id','hccode','hcname','amount'];
    
    public function ledger(){
        return $this->belongsTo(Ledger::class);
    }
    public function institutype(){
        return $this->belongsTo(Institutype::class);
    }
}
