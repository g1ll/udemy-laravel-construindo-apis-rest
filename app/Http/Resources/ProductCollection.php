<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
//        return parent::toArray($request)
        return [
            'data'=>$this->collection,
            'numProducts'=>sizeof($this->collection)//extra data!
        ];
    }

    public function with($request)
    {
        $totalPrice = 0;
        foreach ($this->collection as $product)
            $totalPrice+=$product->price;

        $offPrice = ($totalPrice>100)? $totalPrice*.9:null; // Ten percent of off-price;
        JsonResource::wrap('products'); //change the specific wrap data on json return(default wrap data)
        return [
            'totalPrice'=>$totalPrice,
            'offPrice'=>floatval(number_format($offPrice,2,'.',''))
        ];
    }

}
