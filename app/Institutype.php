<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Institutype extends Model
{
    public function healthcares(){
        return $this->hasMany(Healthcare::class);
    }
}
