<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware' => 'api', 'namespace' => 'Api' ], function () {

    Route::get('/get_location_whats_map', 'FrontController@get_location_whats_map')->name('get_location_whats_map');

    Route::get('/get_all_social_media', 'FrontController@get_all_social_media')->name('get_all_social_media');

    Route::get('/get_all_common_question', 'FrontController@get_all_common_question')->name('get_all_common_question');

    Route::get('/get_aboutus', 'FrontController@get_aboutus')->name('get_aboutus');

    Route::get('/get_all_privacy', 'FrontController@get_all_privacy')->name('get_all_privacy');
    Route::get('/get_all_rule', 'FrontController@get_all_privacy')->name('get_all_privacy');

    Route::get('/get_all_news', 'FrontController@get_all_news')->name('get_all_news');

});
