<?php

namespace App\Services;

use App\Repositories\ShopRepository;
use Yish\Generators\Foundation\Service\Service;

class ShopService extends Service
{
    protected $repository;

    public function __construct()
    {
        $this->repository = new ShopRepository();
    }
    public function getList($area_id, $local = null)
    {
        /*
        //  TODO: validate local_id
        if ($local_id) {
            preg_match('/^\d+/', $local_id, $output);
            if (!is_null($output[0]) && $local_id > 0) {
                $local_of_area = $area->subarea->where('id', '=', $local_id);
                if ($local_of_area->count() != 1) $local_id = null;     //  List->Single subarea
                $local_arr[0] = $local_id;
            }
        }
        */

        return $this->repository->getList($area_id, $local??null, 20);
    }
}
