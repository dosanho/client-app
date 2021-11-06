<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Users\HomePageController;
use \App\Http\Controllers\Users\ProductListController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//
//route client
Route::prefix('/')->group(function(){
//    Home product
    Route::get('',[HomePageController::class,'index']);
    Route::get('/new',[HomePageController::class,'new']);
    Route::get('/product-search',[HomePageController::class,'searchDetail']);






//    search page

    Route::get('/search/',[\App\Http\Controllers\Users\SearchController::class,'index']);

    Route::get('/search-all-page',[\App\Http\Controllers\Users\SearchController::class,'show']);

    Route::get('/search-total-page',[\App\Http\Controllers\Users\SearchController::class,'total']);

    Route::get('/search-all-page-two',[\App\Http\Controllers\Users\SearchController::class,'showTwo']);

//    list product
    Route::get('/product/{cate}/{type?}',[ProductListController::class,'index']);

//    phân trang
    Route::get('/page',[ProductListController::class,'pagination']);


    Route::get('/product/brand/{cates}/{brand?}',[ProductListController::class,'brand']);

//    filter
    Route::get('/product',[ProductListController::class,'search']);
    Route::get('/total',[ProductListController::class,'total']);

//    sắp xếp
    Route::get('/sort',[ProductListController::class,'sort']);




//    product detal
    Route::get('/product-detail/{slug}/',[\App\Http\Controllers\Users\ProductDetailController::class,'index']);
    Route::get('/product-comment',[\App\Http\Controllers\Users\ProductDetailController::class,'comment']);


    //    cart
    Route::get('/cart',[\App\Http\Controllers\Users\CartController::class,'index']);
});

