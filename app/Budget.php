<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    protected $fillable=['department_id','budgetcategory_id','amount','reason','ledger_id'];
    
    public function ledger(){
        return $this->belongsTo(Ledger::class);
    }
    public function budgetcategory(){
        return $this->belongsTo(Budgetcategory::class);
    }
    public function department(){
        return $this->belongsTo(Department::class);
    }
}
