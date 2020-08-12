<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopSearchController extends Controller
{
    //
    public function index($area_id, $local_id)
    {
        return view('shopsearch',
            [

            ]
        );
    }
}
