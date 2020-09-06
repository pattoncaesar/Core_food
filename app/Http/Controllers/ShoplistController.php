<?php

namespace App\Http\Controllers;

use App\Repositories\ShopRepository;
use App\Repositories\AreaRepository;
use App\Repositories\FoodRepository;
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
    protected $areaRepository;
    protected $areaList;
    protected $foodList;

    public function __construct()
    {
        $this->areaRepository = new AreaRepository();
        $this->areaList = $this->areaRepository->getListinASC();
        $this->foodList = (new FoodRepository())->getListinASC();
    }

    public function index($area_id, $local_id = null)
    {
        //  default 台北市
        if (is_null($area_id) || $area_id < 1 || $area_id > 18) $area_id = 1;

        ///////////////////////////////
        /// TODO: service-repository
        //  Info for this area
        $area = $this->areaRepository->find($area_id);

        //  validate local_id
        if ($local_id) {
            preg_match('/^\d+/', $local_id, $output);
            if (!is_null($output[0]) && $local_id > 0) {
                $local_of_area = $area->subarea->where('id', '=', $local_id);
                if ($local_of_area->count() != 1) $local_id = null;     //  List->Single subarea
                $local_arr[0] = $local_id;
            }
        }

        return view('shoplist',
            [
                'area' => $area,
                'shop' => (new ShopRepository())->getList($area_id, $local_arr??null, 20),
                'area_list' => $this->areaList,
                'food_list' => $this->foodList,
                'local_id' => $local_arr??null,
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

        //  TODO: validate input
        $area_id = $request->input('master_area') ?? $request->input('m_list_id');
        $local_id = $request->input('sub_area');

        return view('shoplist',
            [
                'area' => $this->areaRepository->find($area_id),
                'shop' => (new ShopRepository())->getList($area_id, $local_id, 20),
                'area_list' => $this->areaList,
                'food_list' => $this->foodList,
                'local_id' => $local_id,
            ]
        );
    }
}

