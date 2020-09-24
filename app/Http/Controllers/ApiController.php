<?php

namespace App\Http\Controllers;

use App\AreaMain;
use App\Repositories\ShopRepository;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    protected $shopRepository;

    public function __construct(ShopRepository $shop_repo)
    {
        $this->shopRepository = $shop_repo;
    }

    public function getAllShops($area_id = 1, $local_id = null) {
        //  default 台北市
        if (is_null($area_id) || $area_id < 1 || $area_id > 18) $area_id = 1;

        $shops = $this->shopRepository->getList($area_id, ($local_id) ? [0 => $local_id] : null);

        return response($shops, 200);
    }
}
