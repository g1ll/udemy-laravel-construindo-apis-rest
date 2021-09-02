<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ProductRepository
{

    /**
     * @var Model
     */
    private $model;
    /**
     * @var Request
     */
    private $request;

    public function __construct(Model $model, Request $request)
    {

        $this->model = $model;
        $this->request = $request;
    }

    public function selectFilter(){

    }
}
