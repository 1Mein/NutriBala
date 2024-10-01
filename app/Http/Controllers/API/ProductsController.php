<?php

namespace App\Http\Controllers\API;

use App\Models\Product;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class ProductsController extends BaseController
{
    public function index()
    {
        $products = Product::all();
        return response()->json($products);
    }

}
