<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;

class ProductRepository
{

    /**
     * @var Model
     */
    private $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function selectFilter($fields){
        return $this->model->addSelect(explode(',',$fields));
    }

    public function addConditions($conditions){
        $where = [];
        $conditions = explode(';',$conditions);
        foreach ($conditions as $expression) {
            $exp = explode(':', $expression);
            $where = $this->model->where($exp[0], $exp[1], $exp[2]);
        }
        return $where;
    }
}
