<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Requests\DishRequest;
use App\Models\Dish;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class DishesController extends BaseController
{
    public function index(): \Illuminate\Http\JsonResponse
    {
        $dishes = Dish::with('products')->get();
        return response()->json($dishes);
    }

    public function store(DishRequest $request): \Illuminate\Http\JsonResponse
    {
        $items = $request->validated();
        $items['images'] = 'storage/'.$request->file('images')->store('dishes/'.$items['name'].'', 'public');


        $product_ids = $items['product_ids'];
        unset($items['product_ids']);


        $dish = Dish::firstOrCreate($items);

        $dish->products()->attach($product_ids);

        return response()->json($dish);
    }


    public function delete(Dish $dish)
    {
        $dish->delete();
        return response()->json($dish);
    }

}
