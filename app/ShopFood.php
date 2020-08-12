<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopFood extends Model
{
    //
    protected $table = 'shop_foods';

    public function foodsub() {
        return $this->hasOne('App\FoodSub', 'id', 'food_id');
    }
}
