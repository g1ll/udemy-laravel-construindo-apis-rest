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

    public function selectFilter($fields){
        return $this->model->addSelect(explode(',',$fields));
    }

    public function addConditions(){
        $data = [];
        if($this->request->has('conditions')){
            $conditions = explode(';',$this->request->get('conditions'));
            foreach ($conditions as $expression) {
                $exp = explode(':',$expression);
                $data = $this->model->where($exp[0], $exp[1], $exp[2]);
            }
        }
        return $data;
    }
}
