<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{

    protected $fillable=['name','mda_id'];

    public function employees(){
        return $this->hasMany(Employee::class);
    }
    public function assets(){
        return $this->hasMany(Asset::class);
    }
    public function mda(){
        return $this->belongsTo(Mda::class);
    }
    public function recexpenditures(){
        return $this->hasMany(Recexpenditure::class);
    }

    public function procurements(){
        return $this->hasMany(Procurement::class);
    }
    public function budgets(){
        return $this->hasMany(Budget::class);
    }
}
