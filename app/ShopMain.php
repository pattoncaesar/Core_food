<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopMain extends Model
{
    protected $table = 'shop_mains';

    public function foodmain() {
        return $this->hasOne('App\FoodMain', 'id', 'main_food');
    }

    public function foodTags() {
        return $this->hasMany('App\ShopFood', 'shop_table_id');
//        return $this->hasManyThrough('App\FoodSub', 'App\ShopFood','shop_table_id','id'); // App\ShopFood 用了非 id
    }

    public function areamain() {
        return $this->belongsTo('App\AreaMain', 'main_area');
    }

    public function areasub() {
        return $this->belongsTo('App\AreaSub', 'sub_area');
    }

    //  Shop -> Photo
    public function photos() {
        return $this->hasMany('App\ShopPhoto', 'shop_table_id');
    }
}
