<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Procurement extends Model
{
    protected $fillable=['order_id','department_id','amount','procdate','narration'];
    
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
