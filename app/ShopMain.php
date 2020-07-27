<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopMain extends Model
{
    protected $table = 'shop_mains';

    public function foodmain() {
        return $this->belongsTo('App\FoodMain', 'main_food');
    }

    public function areamain() {
        return $this->belongsTo('App\AreaMain', 'main_area');
    }

    public function areasub() {
        return $this->belongsTo('App\AreaSub', 'sub_area');
    }
}
