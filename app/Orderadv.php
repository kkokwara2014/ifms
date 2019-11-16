<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orderadv extends Model
{
    protected $fillable=['ledger_id','supplier_id','stock_id','amount','qty','description'];

    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }
    public function ledger(){
        return $this->belongsTo(Ledger::class);
    }

    public function stock(){
        return $this->belongsTo(Stock::class);
    }
}
