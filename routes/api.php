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
\Laravel\Passport\Passport::$ignoreCsrfToken = true;
//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
Route::post('login','Controller@login');
Route::post('register','Controller@register');
Route::group(['middleware'=>['auth:api','rbac']],function(){
    Route::post('details','Controller@details');
    Route::get('getList','Admin\IndexController@getList');
});