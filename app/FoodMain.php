<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FoodMain extends Model
{
    public function subfood()
    {
        return $this->hasMany('App\FoodSub', 'master_id');
    }
}
