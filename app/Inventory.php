<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    public function assets(){
        return $this->hasMany(Asset::class);
    }
    public function stocks(){
        return $this->hasMany(Stock::class);
    }
}
