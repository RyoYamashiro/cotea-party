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
Route::get('/parties/subscribes/{id}', 'API\SubscribeController@index');
Route::get('/parties/subscribes/{party_id}/{user_name}', 'API\SubscribeController@show');
