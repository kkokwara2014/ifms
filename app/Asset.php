<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    public function department(){
        return $this->belongsTo(Department::class);
    }

    public function inventory(){
        return $this->belongsTo(Inventory::class);
    }
}
