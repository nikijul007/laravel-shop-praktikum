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

Route::post('/', [
    'uses' => 'ProductController@postIndex',
    'as' => 'product.index',
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
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => 'auth',
], function () {
    Route::group([
        'prefix' => 'products',
        'as' => 'products.',
    ], function () {
        Route::get('/', [
            'uses' => 'AdminProductController@index',
            'as' => 'index',
        ]);
        Route::get('/erstellen', [
            'uses' => 'AdminProductController@create',
            'as' => 'create',
        ]);

        Route::post('/erstellen', [
            'uses' => 'AdminProductController@store',
            'as' => 'store',
        ]);

        Route::get('/editieren/{id}', [
            'uses' => 'AdminProductController@edit',
            'as' => 'edit',
        ]);

        Route::post('/editieren/{id}', [
            'uses' => 'AdminProductController@update',
            'as' => 'update',
        ]);
        
        Route::get('/löschen/{id}', [
           'uses' => 'AdminProductController@getDelete',
           'as' => 'delete'
        ]);
       
        
        Route::post('/löschen/{id}', [
           'uses' => 'AdminProductController@postDelete',
           'as' => 'del'
        ]);
        
        Route::get('/gelöschte', [
            'uses' => 'AdminProductController@geloescht',
            'as' => 'geloescht'
        ]);
        
        Route::get('/wiederherstellen/{id}', [
           'uses' => 'AdminProductController@restore',
            'as' => 'restore'
        ]);
        
        Route::post('/wiederherstellen/{id}', [
           'uses' => 'AdminProductController@restored',
            'as' => 'restored'
        ]);
    });
});

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
