<?php

namespace App\Http\Controllers;

use App\AreaMain;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getAllShops($areaId = 1) {
        $shops = AreaMain::find($areaId)->shopmains->toJson(JSON_PRETTY_PRINT);
        return response($shops, 200);
    }
}
