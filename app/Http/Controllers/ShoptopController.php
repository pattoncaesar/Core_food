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
        $photos_data = [];
        $foodTagsName = [];

        //  TODO: check $id
        $shop = App\ShopMain::find($id); //抓一個
        $photos = $shop->photos;
        foreach ($shop->foodTags as $foodsub) {
            $foodTagsName[] = $foodsub->foodsub->food_name;
        }

        foreach ($photos as $photo) {
            $photos_data[] = (($photo->photo_num) % 32) == 0 ? '1.png' : (($photo->photo_num) % 32) . '.png';
        }

        //  random photo
//        for ($i = 0; $i < 3; $i++) {
//            # code...
//            $photos[] = (($photo->photo_num + $i) % 32) == 0 ? '1.png' : (($photo->photo_num + $i) % 32) . '.png';
//        }

        return view('shoptop',
            [
                'shop' => $shop,
                'photos' => $photos_data,
                'foodmain_name' => $shop->foodmain->food_name,
                'food_name_sub' => implode(" / ", $foodTagsName),
            ]
        );

    }
}
