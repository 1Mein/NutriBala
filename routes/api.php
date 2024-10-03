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
Route::group(['prefix' => '/v1'], function (){
    Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
        return $request->user();
    });

    Route::group(['middleware' => 'auth:sanctum'], function() {
        Route::get('/admin/products', [\App\Http\Controllers\API\Admin\ProductsController::class,'index'])->name('admin.index.products');
        Route::post('/admin/products',[\App\Http\Controllers\API\Admin\ProductsController::class, 'store'])->name('admin.store.products');
        Route::delete('/admin/products/{product}',[\App\Http\Controllers\API\Admin\ProductsController::class, 'delete'])->name('admin.delete.products');



        Route::get('/admin/dishes',[\App\Http\Controllers\API\Admin\DishesController::class, 'index'])->name('admin.index.dishes');
        Route::post('/admin/dishes',[\App\Http\Controllers\API\Admin\DishesController::class, 'store'])->name('admin.store.dishes');
        Route::delete('/admin/dishes/{dish}',[\App\Http\Controllers\API\Admin\DishesController::class, 'delete'])->name('admin.delete.dishes');
    });

    Route::post('/login', [\App\Http\Controllers\API\UserController::class,'login'])->name('login');

    Route::get('/products',[\App\Http\Controllers\API\ProductsController::class, 'index'])->name('index.products');
    Route::get('/products/{product}')->name('show.products');
    Route::get('/products/{product}/dishes',[\App\Http\Controllers\API\ProductsController::class, 'dishes'])->name('show.products.dishes');
    Route::get('/dishes',[\App\Http\Controllers\API\DishesController::class, 'index'])->name('index.dishes');
    Route::get('/dishes/{dish}')->name('show.dishes');

});

