<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contractor extends Model
{

    protected $fillable=['contnumber','fullname','compname','address','phone','email'];

    public function contractadvs(){
        return $this->hasMany(Contractoradv::class);
    }
}
