<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShoplistController extends Controller
{
    public function index()
    {
        $t = \App\Areamain::all();
        dd($t);
    }
}
