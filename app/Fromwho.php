<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fromwho extends Model
{
    public function grants(){
        return $this->hasMany(Grant::class);
    }
}
