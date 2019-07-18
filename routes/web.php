<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::match(['get', 'post'], '/botman', 'BotManController@handle');
Route::get('/botman/tinker', 'BotManController@tinker');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//admin
Route::group(["middleware"=>"auth","prefix"=>"admin"],function(){
    Route::get('/analytics','Admin\AdminController@analytics')->name('analytics');
    Route::get('/index','Admin\AdminController@index')->name('admin');
    //category
    Route::get('/category',"Admin\CategoryController@index")->name('category');
    Route::get('/category/create',"Admin\CategoryController@create")->name('category.add');
    Route::post('/category/create',"Admin\CategoryController@store");
    Route::get('/category/{$id}',"Admin\CategoryController@show");
    Route::get('/category/edit/{id}',"Admin\CategoryController@edit");
    Route::post('/category/edit/{id}',"Admin\CategoryController@saveOne");
    Route::post('/category/delete/{id}',"Admin\CategoryController@destroy");
    //transaction
    Route::get('/transaction',"Admin\TransactionController@index")->name('transaction');
    Route::get('/transaction/pennding',"Admin\TransactionController@pending")->name('transaction.pend');
    Route::get('/transaction/history',"Admin\TransactionController@history")->name('transaction.history');
    Route::get('/transaction/request',"Admin\TransactionController@request")->name('transaction.request');
    //product
    Route::get('/product',"Admin\ProductController@index")->name('products');
    Route::get('/product/create',"Admin\ProductController@create")->name('product.add');
    Route::post('/product/create',"Admin\ProductController@store");
    Route::get('/product/{$id}',"Admin\ProductController@show");
    Route::get('/product/edit/{id}',"Admin\ProductController@edit");
    Route::post('/product/edit/{id}',"Admin\ProductController@saveOne");
    Route::post('/product/delete/{id}',"Admin\ProductController@destroy");
    });
    //user
    Route::group(["middleware"=>"auth"],function(){
    
    });

    
