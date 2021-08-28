<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
//        return parent::toArray($request);

         return  [
             'name'=>$this->name,
             'description'=>$this->description,
             'price'=>$this->price,
             'offPrice'=>($this->price>100)?$this->price*.9:null //Evaluates off-price of 10%
         ];
//        return $this->resource->toArray();
    }
}
