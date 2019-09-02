<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Budgetcategory extends Model
{
    public function budgets()
    {
        return $this->hasMany(Budget::class);
    }
}
