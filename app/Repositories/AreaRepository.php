<?php

namespace App\Repositories;

use App\AreaMain;
use Yish\Generators\Foundation\Repository\Repository;

class AreaRepository extends Repository
{
    protected $model;

    public function __construct()
    {
        $this->model = new AreaMain();
    }

    /**
     * Get all post.
     *
     * @return AreaMain $model
     */
    public function getListinASC()
    {
        return $this->model->orderBy('order', 'asc')->get();
    }
}
