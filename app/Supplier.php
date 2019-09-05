<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable=['supnumber','fullname','compname','address','phone','email'];

    public function orders(){
        return $this->hasMany(Order::class);
    }
    public function orderadvs(){
        return $this->hasMany(Orderadv::class);
    }
}
