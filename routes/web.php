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

Route::get('/', 'IndexController@index');
Route::get('/shop2', 'IndexController@shop');

Route::get('/shop', function() {
    return view('shop/index');
});

//Route::get('/test', 'MeinController@sageHallo');


