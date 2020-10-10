<?php

namespace App\Repositories;

use App\ShopMain;
use Yish\Generators\Foundation\Repository\Repository;

class ShopRepository extends Repository
{
//    protected $model;

    public function __construct()
    {
//        $this->model = $shop;
    }

    public function getList($main_area, $sub_area = null, $main_food = null, $s_food = null, $per_page_num = 20)
    {
        $query = ShopMain::where('main_area', '=', $main_area);

        if ($sub_area) $query->whereIn('sub_area', $sub_area);
        if ($main_food) $query->where('main_food', $main_food);
        if ($s_food) {
            $query->join('shop_foods', 'shop_mains.id', '=', 'shop_foods.shop_table_id')
            ->whereIn('food_id', $s_food);
        }

        return $query->paginate($per_page_num);
    }
}
