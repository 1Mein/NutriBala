<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::post('/testt',[\App\Http\Controllers\API\ProductsController::class,'test']);

Route::get('/{vue_capture?}', function () {
    return view('app');
})->where('vue_capture', '[\/\w\.-]*');
