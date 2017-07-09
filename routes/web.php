<?php

/*
  | Web Routes
  |--------------------------------------------------------------------------
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

Route::get('/', [
    'uses' => 'ProductController@getIndex',
    'as' => 'product.index',
]);
Route::get('/start', 'IndexController@index');

Route::get('/add-to-card/{id}', [
   'uses' => 'ProductController@addToCard',
    'as' => 'product.addToCard',
]);

 Route::get('/shoppingCard', [
   'uses' => 'ProductController@getCard',
    'as' => 'product.shoppingCard',
]);

Route::group([
    'prefix' => 'users',
    'as' => 'users.',
], function () {
    Route::group(['middleware' => 'guest'], function () {
        //Sign Up
        Route::get('/signup', [
            'uses' => 'UserController@getSignup',
            'as' => 'signup',
        ]);
        Route::post('/signup', [
            'uses' => 'UserController@postSignup',
            'as' => 'signup',
        ]);
        //Sign In
        Route::get('/signin', [
            'uses' => 'UserController@getSignin',
            'as' => 'signin',
        ]);
        Route::post('/signin', [
            'uses' => 'UserController@postSignin',
            'as' => 'signin',
        ]);
    });
    Route::group(['middleware' => 'auth'], function () {
        //Profile
        Route::get('/profile', [
            'uses' => 'UserController@getProfile',
            'as' => 'profile',
        ]);
        //Logout
        Route::get('/logout', [
            'uses' => 'UserController@getLogout',
            'as' => 'logout',
        ]);
    });
});
