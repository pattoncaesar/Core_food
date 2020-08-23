<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AreaMain extends Model
{
    //
    public function shopmains()
    {
        return $this->hasMany('App\ShopMain', 'main_area');
    }
    public function subarea()
    {
        return $this->hasMany('App\AreaSub', 'master_id');
    }
}
