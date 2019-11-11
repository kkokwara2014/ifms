<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grant extends Model
{
    protected $fillable=['amount','comment','fromwho_id'];

    public function fromwho(){
        return $this->belongsTo(Fromwho::class);
    }
}
