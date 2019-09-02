<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contractoradv extends Model
{
    public function contractor(){
        return $this->belongsTo(Contractor::class);
    }
}
