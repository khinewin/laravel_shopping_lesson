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

Route::get('/', [
    'uses'=>'HomeController@getIndex',
    'as'=>'/'
]);
Route::get('/coffeePhoto/{fileName}',[
    'uses'=>'HomeController@getCoffeePhoto',
    'as'=>'coffeePhoto'
]);
Route::get('/addToCart/{id}',[
    'uses'=>'HomeController@AddToCart',
    'as'=>'addToCart'
]);
Route::get('/cart',[
    'uses'=>'HomeController@showCart',
    'as'=>'cart'
]);
Route::get('/clearCart',[
    'uses'=>'HomeController@getClearCart',
    'as'=>'clearCart'
]);
Route::get('/reduceByOne/{id}',[
    'uses'=>'HomeController@ReduceByOne',
    'as'=>'reduceByOne'
]);
Route::get('/removeItem/{id}',[
    'uses'=>'HomeController@reduceItem',
    'as'=>'removeItem'
]);
Route::group(['prefix'=>'auth'],function (){
    Route::get('/login',[
        'uses'=>'AuthController@getLogin',
        'as'=>'login'
    ]);
    Route::get('/register',[
        'uses'=>'AuthController@getRegister',
        'as'=>'register'
    ]);
    Route::post('/login',[
        'uses'=>'AuthController@postLogin',
        'as'=>'login'
    ]);
    Route::post('/register',[
        'uses'=>'AuthController@postRegister',
        'as'=>'register'
    ]);
});
Route::group(['prefix'=>'coffee'],function (){
    Route::group(['middleware'=>'auth'],function (){
        Route::get('/categories',[
            'uses'=>'CoffeeController@getCoffeeCategories',
            'as'=>'categories'
        ]);
        Route::post('/newCategory',[
            'uses'=>'CoffeeController@postNewCategory',
            'as'=>'newCategory'
        ]);
        Route::get('/showCategory',[
            'uses'=>'CoffeeController@showCategory',
            'as'=>'showCategory'
        ]);
        Route::get('/delCat',[
            'uses'=>'CoffeeController@getDelCat',
            'as'=>'delCat'
        ]);
        Route::get('/showCoffee',[
            'uses'=>'CoffeeController@getCoffee',
            'as'=>'showCoffee'
        ]);
        Route::post('/newCoffee',[
            'uses'=>'CoffeeController@postNewCoffee',
            'as'=>'newCoffee'
        ]);
        Route::get('/showCoffeePhoto/{fileName}',[
            'uses'=>'CoffeeController@showCoffeePhoto',
            'as'=>'showCoffeePhoto'
        ]);
        Route::post('/deleteCoffee',[
            'uses'=>'CoffeeController@postDeleteCoffee',
            'as'=>'deleteCoffee'
        ]);
    });
});
Route::group(['prefix'=>'user'],function (){

        Route::group(['middleware'=>'auth'],function (){
        Route::get('/dashboard', [
            'uses'=>'UserController@getHome',
            'as'=>'dashboard'
        ]);
        Route::get('/logout',[
            'uses'=>'UserController@getLogout',
            'as'=>'logout'
        ]);

    });


});
