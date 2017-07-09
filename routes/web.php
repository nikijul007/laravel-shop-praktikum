<?php

/*
  | Web Routes
  |--------------------------------------------------------------------------
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

Route::get('/start', 'IndexController@index');
//Route::get('/', 'IndexController@shop');
/* Route::get('/shop', [
  'uses' => 'ProductController@getIndex',
  'as' => 'product.index'
  ]); */
    Route::get('/', [
        'uses' => 'ProductController@getIndex',
        'as' => 'product.index',
    ]);
    
    Route::get('/add-to-card/{id}',[
       'uses'=> 'ProductController@addToCard',
        'as'=> 'product.addToCard'
    ]);
    
     Route::get('/shoppingCard',[
       'uses'=> 'ProductController@getCard',
        'as'=> 'product.shoppingCard'
    ]);


    
    Route::group(['prefix' => 'users'], function() {
    
    Route::group(['middleware' => 'guest'], function() {
        //Sign Up
        Route::get('/signup', [
            'uses' => 'UserController@getSignup', 
            'as' => 'users.signup']);
        Route::post('/signup', [
            'uses' => 'UserController@postSignup', 
            'as' => 'users.signup']);
        //Sign In
        Route::get('/signin', [
            'uses' => 'UserController@getSignin', 
            'as' => 'users.signin']);
        Route::post('/signin', [
            'uses' => 'UserController@postSignin', 
            'as' => 'users.signin']);
    });
    Route::group(['middleware' => 'auth'], function() {
        //Profile
        Route::get('/profile', [
            'uses' => 'UserController@getProfile',
            'as' => 'users.profile']);
        //Logout
        Route::get('/logout', [
            'uses' => 'UserController@getLogout', 'as' => 'users.logout']);
    });
});





/*Route::get('/shop', function() {
    return view('shop/index');
});*/

//Route::get('/test', 'MeinController@sageHallo');


