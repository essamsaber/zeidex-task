<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::put('images/delete', 'Backend\ProductImagesController');

Route::apiResource('categories', 'Backend\CategoriesController');
Route::apiResource('products', 'Backend\ProductsController');

