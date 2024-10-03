<?php

namespace App\Http\Controllers\API;

use App\Models\Dish;
use Illuminate\Routing\Controller as BaseController;

class DishesController extends BaseController
{
    public function index(): \Illuminate\Http\JsonResponse
    {
        $dishes = Dish::with('products')->get();
        return response()->json($dishes);
    }

}
