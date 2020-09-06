<?php

namespace App\Repositories;

use App\FoodMain;
use Yish\Generators\Foundation\Repository\Repository;

class FoodRepository extends Repository
{
    protected $model;

    public function __construct()
    {
        $this->model = new FoodMain();
    }

    public function getListinASC()
    {
        return $this->model->orderBy('order', 'asc')->get();
    }
}
