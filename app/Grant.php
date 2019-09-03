<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grant extends Model
{
    public function fromwho(){
        return $this->belongsTo(Fromwho::class);
    }
}
