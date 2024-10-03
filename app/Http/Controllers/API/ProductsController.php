<?php

namespace App\Http\Controllers\API;

use App\Models\Dish;
use App\Models\Product;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Request;

class ProductsController extends BaseController
{
    public function index()
    {
        $products = Product::all();
        return response()->json($products);
    }

    public function test(Request $request)
    {
        $dish = Dish::find(1);
        $products = Product::all();

//        $dish->products()->attach([1,2]);
        dd($request);
    }

    public function dishes(Product $product)
    {
        return response()->json($product->dishes);
    }

}
