<?php

namespace App\Http\Controllers;

use App\AreaMain;
use App\AreaSub;
use App\FoodMain;
use App\ShopMain;
use DB;
use Illuminate\Http\Request;

/*
 * Shop -> Area, Local
 * shop_name, shop_text, main_food, open_time, address
 *      sub food
 */

class ShoplistController extends Controller
{
    public function index($area_id, $local_id = null)
    {
        //  default 台北市
        if (is_null($area_id) || $area_id < 1 || $area_id > 18) $area_id = 1;

        //  validate local_id
        $local_of_area = AreaSub::where('master_id', '=', $area_id)
                ->where('id', '=', $local_id);
        if ($local_of_area->count() != 1)   $local_id = null;

        //  Info for this area
        $area = AreaMain::find($area_id);

        //  arealist, foodlist for right side menu
        $area_list = AreaMain::orderBy('order', 'asc')->get();
        $food_list = FoodMain::orderBy('order', 'asc')->get();

        //  TODO: Move to Repository
        //  User Story
        //  AreaMain 1-m ShopMain
        //  +FoodMain

//        $t = AreaMain::find($area_id)->shopmains;
        if ($local_id) {
            $shop = ShopMain::where('main_area', '=', $area_id)
                ->where('sub_area', '=', $local_id)
                ->paginate(20);
        } else {
            $shop = ShopMain::where('main_area', '=', $area_id)
                ->paginate(20);
        }

        return view('shoplist',
            [
                'area' => $area,
                'shop' => $shop,
                'area_list' => $area_list,
                'food_list' => $food_list,
            ]
        );

    }
}
