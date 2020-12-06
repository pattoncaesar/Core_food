<?php

namespace App\Http\Controllers;

use App\Repositories\AreaRepository;
use App\Repositories\FoodRepository;
use App\Repositories\ShopRepository;
use Illuminate\Http\Request;

class ShopRankingController extends Controller
{
    protected $areaRepository;
    protected $shopRepository;
    protected $foodRepository;
    protected $areaList;
    protected $foodList;

    public function __construct(ShopRepository $shop_repo, AreaRepository $area_repo, FoodRepository $food_repo)
    {
        $this->shopRepository = $shop_repo;
        $this->areaRepository = $area_repo;
        $this->foodRepository = $food_repo;
        $this->areaList = $this->areaRepository->getListinASC();
        $this->foodList = $this->foodRepository->getListinASC();
    }

    //
    public function index($area_id, $local_id = null)
    {
        if (is_null($area_id) || $area_id < 1 || $area_id > 18) $area_id = 1;

        //  Info for this area
        $area = $this->areaRepository->find($area_id);

        return view('shopranking',
            [
                'area' => $area,
                'shop' => $this->shopRepository->getRanking($area_id, ($local_id) ? [0 => $local_id] : null),
                'area_list' => $this->areaList,
                'food_list' => $this->foodList,
                'local_id' => ($local_id) ? [0 => $local_id] : null,
            ]
        );
    }
}
