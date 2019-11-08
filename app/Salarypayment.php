<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salarypayment extends Model
{
    protected $fillable=['mda_id','amount','salarymonthyear'];

    public function mda(){
        return $this->belongsTo(Mda::class);
    }
    public function expenditures(){
        return $this->hasMany(Expenditure::class);
    }
}
