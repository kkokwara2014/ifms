<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Procurement extends Model
{
    public function order(){
        return $this->belongsTo(Order::class);
    }
    public function department(){
        return $this->belongsTo(Department::class);
    }
    public function expenditures(){
        return $this->hasMany(Expenditure::class);
    }
}
