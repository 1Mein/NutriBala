<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('/v1/products',[\App\Http\Controllers\API\ProductsController::class, 'index'])->name('index.products');
Route::get('/v1/products/{product}')->name('show.products');
Route::get('/v1/dishes/')->name('index.dishes');
Route::get('/v1/dishes/{dish}')->name('show.dishes');

