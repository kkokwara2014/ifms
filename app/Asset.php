<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $fillable=['name','description','acquisitiondate','department_id','inventory_id'];

    public function department(){
        return $this->belongsTo(Department::class);
    }

    public function inventory(){
        return $this->belongsTo(Inventory::class);
    }
}
