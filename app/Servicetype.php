<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicetype extends Model
{
    public function recexpenditures(){
        return $this->hasMany(Recexpenditure::class);
    }
}
