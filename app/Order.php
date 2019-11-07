<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable=['stock_id','supplier_id','qty','comment'];

    public function stock(){
        return $this->belongsTo(Stock::class);
    }
    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }
    public function procurements(){
        return $this->hasMany(Procurement::class);
    }
}
