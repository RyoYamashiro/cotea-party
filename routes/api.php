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
Route::get('/parties/{index}','API\PartiesController@index');
Route::get('/parties/subscribes/{party_id}/{user_id}', 'API\SubscribeController@show');
Route::post('/parties/subscribes/{party_id}/{user_id}/{status}', 'API\SubscribeController@update');
