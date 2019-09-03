<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    public function orders(){
        return $this->hasMany(Order::class);
    }
    public function inventory(){
        return $this->belongsTo(Inventory::class);
    }
}
