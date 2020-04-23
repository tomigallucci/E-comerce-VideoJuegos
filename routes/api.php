<?php

use Illuminate\Http\Request;  
#                  
Route::group([],function(){
    Route::get('/Users', 'UserController@api');
    Route::get('/Products', 'ProductController@api');
    Route::get('/Categories', 'CategoryController@api');
    Route::get('/Trademarks', 'TrademarkController@api');
    Route::get('/Offerdays', 'OfferdayController@api');
    Route::get('/Languages', 'LanguageController@api');
    Route::get('/Merchandises', 'MerchandiseController@api');

});
#
Route::group([],function(){
    Route::post('/Users', 'UserController@api_show');
    Route::post('/Categories', 'CategoryController@api_show');
    Route::post('/Languages', 'LanguageController@api_show');
    Route::post('/Trademarks', 'TrademarkController@api_show');
    Route::post('/Offerdays', 'OfferdayController@api_show');
    Route::post('/Products', 'ProductController@api_show');
    Route::post('/Merchandises', 'MerchandiseController@Api_show');

});



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
