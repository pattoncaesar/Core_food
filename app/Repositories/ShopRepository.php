<?php

namespace App\Repositories;

use App\ShopMain;
use Yish\Generators\Foundation\Repository\Repository;

class ShopRepository extends Repository
{
    protected $model;

    public function __construct()
    {
        $this->model = new ShopMain();
    }

    public function getList($main_area, $sub_area = null, $per_page_num = 20)
    {

        if ($sub_area) {
            return $this->model->where('main_area', '=', $main_area)
                ->whereIn('sub_area', $sub_area)
                ->paginate($per_page_num);
                //->paginate($per_page_num,['*'],'page',$page_num);
        } else {
            return $this->model->where('main_area', '=', $main_area)
                ->paginate($per_page_num);
        }
    }
}
