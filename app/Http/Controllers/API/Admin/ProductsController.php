<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Requests\DishRequest;
use App\Http\Requests\ProductRequest;
use App\Models\Dish;
use App\Models\Product;

class ProductsController
{
    public function index()
    {
        $products = Product::all();
        return response()->json($products);
    }


    public function store(ProductRequest $request): \Illuminate\Http\JsonResponse
    {
        $items = $request->validated();
        $items['images'] = 'storage/'.$request->file('images')->store('products/'.$items['name'], 'public');

        $product = Product::firstOrCreate($items);

        return response()->json($product);
    }

    public function delete(Product $product): \Illuminate\Http\JsonResponse
    {
        $product->delete();
        return response()->json($product);
    }
}
