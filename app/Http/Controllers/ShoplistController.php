<?php

namespace App\Http\Controllers;

use App\Services\ShopService;
use App\Repositories\AreaRepository;
use App\Repositories\FoodRepository;
use DB;
use Illuminate\Http\Request;

/*
 * Shop -> Area, Local
 * shop_name, shop_text, main_food, open_time, address
 *      sub food
 */

class ShoplistController extends Controller
{
    protected $areaRepository;
    protected $areaList;
    protected $foodList;
    protected $shopService;

    public function __construct()
    {
        $this->shopService = new ShopService();
        $this->areaRepository = new AreaRepository();
        $this->areaList = $this->areaRepository->getListinASC();
        $this->foodList = (new FoodRepository())->getListinASC();
    }

    public function index($area_id, $local_id = null)
    {
        //  default 台北市
        if (is_null($area_id) || $area_id < 1 || $area_id > 18) $area_id = 1;

        //  Info for this area
        $area = $this->areaRepository->find($area_id);

        return view('shoplist',
            [
                'area' => $area,
                'shop' => $this->shopService->getList($area_id, ($local_id)?[0=>$local_id]:null),
                'area_list' => $this->areaList,
                'food_list' => $this->foodList,
                'local_id' => ($local_id)?[0=>$local_id]:null,
            ]
        );
    }

    //  List Page -> Search
    public function search(Request $request)
    {
        /*
         * Use Case：
         * - 全XXX local=0（All subarea）
         * - single subarea
         * - multiple subarea
         */

        $area_id = $request->input('master_area') ?? $request->input('m_list_id');
        $local_id = $request->input('sub_area');

        return view('shoplist',
            [
                'area' => $this->areaRepository->find($area_id),
                'shop' => $this->shopService->getList($area_id, $local_id),
                'area_list' => $this->areaList,
                'food_list' => $this->foodList,
                'local_id' => $local_id,
            ]
        );
    }
}

