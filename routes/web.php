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

Route::get('/adminsignin', [
   'uses' => 'AdminController@getSignin',
    'as' => 'verwaltung.admin',
]);

Route::post('/adminsignin', [
   'uses' => 'AdminController@postSignin',
    'as' => 'verwaltung.admin',
]);

Route::get('/createProduct', [
    'uses' => 'AdminController@getAdminCreate',
    'as' => 'admin.createProduct',
]);

Route::post('/adminpage', [
   'uses' => 'AdminProductController@postCreate',
    'as' => 'admin.create',
]);

Route::get('/adminpage1/{id}', [
    'uses' => 'AdminProductController@getChange',
    'as' => 'admin.changeProduct'
]);

Route::post('/adminpage1/{id}', [
    'uses' => 'AdminProductController@postChange',
    'as' => 'admin.changeProduct'
]);

Route::get('/products', [
   'uses' => 'AdminProductController@getProducts',
    'as' => 'admin.products',
]);

Route::group([
    'prefix' => 'product',
    'as' => 'product.',
        ], function () {
            Route::post('/add-to-card/{id}', [
        'uses' => 'ProductController@addToCard',
        'as' => 'addToCard',
    ]);

            Route::get('/addOne/{id}', [
        'uses' => 'ProductController@addOne',
        'as' => 'addOne',
    ]);

            Route::get('/reduceby1/{id}', [
        'uses' => 'ProductController@remove1',
        'as' => 'reduceOne',
    ]);
            Route::get('/reduceall/{id}', [
        'uses' => 'ProductController@removeAll',
        'as' => 'reduceall',
    ]);

            Route::get('/deleteCard', [
        'uses' => 'ProductController@deleteCard',
        'as' => 'deleteCard',
    ]);

            Route::get('/shoppingCard', [
        'uses' => 'ProductController@getCard',
        'as' => 'shoppingCard',
        
    ]);
        });

Route::get('/checkout', [
    'uses' => 'ProductController@getCheckout',
    'as' => 'checkout',
    'middleware' => 'auth',
]);
Route::post('/checkout', [
    'uses' => 'ProductController@postCheckout',
    'as' => 'checkout',
    'middleware' => 'auth',
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
