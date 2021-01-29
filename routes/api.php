<?php

use Illuminate\Http\Request;

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::any("/tests", "TestController@tests");

Route::group(['prefix' => 'star'], function ($router) {

    // 获取日志
    $router->get('lists', 'StarController@lists');

    // 新增
    $router->post('add', 'StarController@add');

    // 新增page
    $router->get('add-page', 'StarController@addPage');
});

