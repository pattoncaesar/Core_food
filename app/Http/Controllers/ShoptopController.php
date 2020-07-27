<?php

namespace App\Http\Controllers;

use App;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Shop;


class ShoptopController extends Controller
{
    public function index($id)
    {
        //  TODO: check $id
        $shop = App\ShopMain::find($id); //抓一個
//        $photo = App\ShopPhoto::find();
//        dd($shop);
        //  random photo
//        for($i=0;$i<3;$i++) {
//            # code...
//            $photos[] = (($shop['photo_num']+$i)%32)==0?'1.png':(($shop['photo_num']+$i)%32).'.png';
//        }
//$shoptop['photos']=$photos;
//    //print_r($shoptop);
//
//
        return view('shoptop',
            [
                'shop' => $shop,
//        'photos' => $photos
            ]
        );

    }
}
