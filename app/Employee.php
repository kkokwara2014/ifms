<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{

    protected $fillable=['empnumber','fullname','compname','address','phone','email','designation','dob','gender','maritalstatus','appointmentdate','bank_id'];

    public function qualification(){
        return $this->belongsTo(Qualification::class);
    }
    public function rank(){
        return $this->belongsTo(Rank::class);
    }
    public function bank(){
        return $this->belongsTo(Bank::class);
    }
    public function empunion(){
        return $this->belongsTo(Empunion::class);
    }
    public function department(){
        return $this->belongsTo(Department::class);
    }
    public function fundrets(){
        return $this->hasMany(Fundret::class);
    }
    public function deductions(){
        return $this->hasMany(Deduction::class);
    }
    public function employmentstatuses(){
        return $this->hasMany(Employeestatus::class);
    }
    public function recexpenditures(){
        return $this->hasMany(Recexpenditure::class);
    }
    
    
}
