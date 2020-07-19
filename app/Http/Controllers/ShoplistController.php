<?php

namespace App\Http\Controllers;

use App\AreaMain;
use App\ShopMain;
use DB;
use Illuminate\Http\Request;

class ShoplistController extends Controller
{
    public function index()
    {
        DB::connection()->enableQueryLog();

        //  TODO: Move to Repository
        //  User Story
        //  AreaMain 1-m ShopMain
        //  +FoodMain

        $t = AreaMain::find(1)->shopmains;

        // 取得資料庫查詢的 Qeury Log
        //$queries = DB::getQueryLog();
        //$last_query = end($queries);
        //var_dump($last_query);

        //dd($t);
        foreach ($t as $i){
            echo $i->shop_name;
            echo $i->main_title;
        }

    }
}
