<?php

namespace App\Http\Controllers\api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\productResourse;

class ProductController extends Controller
{
    use ResponseTrait;
    public function index()
    {
        $products =  productResourse::collection(Product::get());

        return $this->apiResponse($products,'created successfully','200');
    }

    public function show($id){
        $product = Product::find($id);
        if($product){

            return $this->apiResponse(new productResourse($product),'created successfully','200');
        }else{
            return $this->apiResponse(null,'Product not found','404');
        }

    }
}
