<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ledger extends Model
{
    protected $fillable=['name'];
    
    public function fundrets()
    {
        return $this->hasMany(Fundret::class);
    }
    public function budgets()
    {
        return $this->hasMany(Budget::class);
    }
    public function healthcares()
    {
        return $this->hasMany(Healthcare::class);
    }
    public function recexpenditures()
    {
        return $this->hasMany(Recexpenditure::class);
    }
    public function expenditures()
    {
        return $this->hasMany(Expenditure::class);
    }
    public function revenues()
    {
        return $this->hasMany(Revenue::class);
    }
    public function accountpayables()
    {
        return $this->hasMany(Accountpayable::class);
    }
    public function accountreceivables()
    {
        return $this->hasMany(Accountreceivable::class);
    }
}
