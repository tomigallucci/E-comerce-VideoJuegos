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

Route::get('/', 'GamingController@all');

Route::get('/search', 'GamingController@index')->name('searchAdvanced');
Route::get('/gaming', 'GamingController@index')->name('gaming');
Route::get('/gaming/{id}', 'ProductController@show');

Route::get('/merchandise', 'MerchandiseController@index1')->name('merchandise');
Route::get('/faq', function(){
    return view('faq');
})->name('faq');
Route::get('/contact', 'MessageController@index')->name('contact');
Route::get('/cart', function(){
    return view('shop-cart');
})->middleware('auth')->name('cart');
Route::get('/profile', 'UserController@index')->name('profile');
Route::put('/profile', 'UserController@update');
Route::post('/contact', 'MessageController@store')->name('mail.send');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/fav', function(){
    return view('fav');
})->middleware('auth')->name('fav');
#

#
Route::prefix('admin')->middleware('admin')->group(function(){
    Route::get('/', 'AdminController@index')->name('admin');
    Route::view('/users', 'users')->name('admin.users');
    Route::get('/gaming', 'ProductController@index')->name('admin.games');
    Route::get('/merchandise', 'MerchandiseController@index')->name('admin.merchandise');
    Route::view('/trademark', 'trademarks')->name('admin.trademarks');
    Route::view('/categories', 'categories')->name('admin.categories');
    Route::view('/languages', 'languages')->name('admin.languages');
    
    Route::group(['middleware' => 'admin'],function(){
        Route::get('/users/{id}/{photo?}', 'UserController@delete');
        Route::get('/products/{id}/{code}', 'ProductController@delete');
        Route::get('/trademarks/{id}', 'TrademarkController@delete');
        Route::get('/merchandises/{id}/{code}', 'MerchandiseController@delete');
        Route::get('/categories/{id}', 'CategoryController@delete');
        Route::get('/languages/{id}', 'LanguageController@delete');
    });
    Route::group(['middleware' => 'admin'],function(){
        Route::post('/trademark', 'TrademarkController@create')->name('trademark.create');
        Route::post('/category', 'CategoryController@create')->name('category.create');
        Route::post('/language', 'LanguageController@create')->name('language.create');
        Route::post('/games', 'ProductController@create')->name('game.create');
        Route::post('/merchandise', 'MerchandiseController@create')->name('merchandise.create');


        Route::put('/trademark', 'TrademarkController@update')->name('trademark.edit');
        Route::put('/language', 'LanguageController@update')->name('language.edit');
        Route::put('/category', 'CategoryController@update')->name('category.edit');
        Route::put('/games', 'ProductController@update')->name('game.edit');
        Route::put('/merchandise', 'MerchandiseController@update')->name('merchandise.edit');

    });
});