<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use App\Repository\ProductRepository;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * @var Product
     */
    private $product;

    public function __construct(Product $product)
    {

        $this->product = $product;
    }

    public function index(Request $request)
    {
        $products = $this->product;
        if($request->all()){
            $repository = new ProductRepository($this->product);

            if($request->has('conditions'))
                $repository->addConditions($request->get('conditions'));

            if($request->has('fields'))
                $repository->selectFilter($request->get('fields'));

            $products = $repository->getResult();

//            return response()->json($products->paginate(10));//does not able to use collection
        }

        return new ProductCollection($products->paginate(10));
    }

    public function show($id){
        $product = $this->product->find($id);
//        return response()->json($product);
        return new ProductResource($product);
    }


    public function save(Request $request){
        $data = $request->all();
        $product = $this->product->create($data);

        return response()->json($product);
    }

    public function update(Request $request){
        $data  = $request->all();

        $product = $this->product->find($data['id']);
        $product->update($data);

        return response()->json($product);
    }

    public function delete($id){
        if(!$product = $this->product->find($id))
             return response()->json(['data'=>['msg'=>'Sorry ! An error occurred, try later !']],500);
        $product->delete();
        return response()->json(['data'=>['msg'=>"Product {$id} was removed successfully!"]]);
    }
}
