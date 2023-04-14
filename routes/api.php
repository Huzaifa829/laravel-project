<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DHLController;

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
Route::any('search','App\Http\Controllers\SearchController@searchdata');
Route::any('mobilesearch','App\Http\Controllers\SearchController@mobilesearch');
Route::any('brand-search','App\Http\Controllers\SearchController@brandSearch');
Route::any('product-search','App\Http\Controllers\SearchController@productSearch');
Route::any('category-search','App\Http\Controllers\SearchController@categorySearch');

Route::get('/getSingleShipment',[DHLController::class,'getSingleProductRate'])->name('dhl.getSingleShipment');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
