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
Auth::routes();
Route::get('/', 'PartyController@index')->name('parties.index');
Route::resource('/parties', 'PartyController')->except(['index'])->middleware('auth');

Route::prefix('users')->name('users.')->middleware('auth')->group(function () {
    Route::get('/{name}', 'UserController@show')->name('show');
    Route::get('/{name}/edit', 'UserController@edit')->name('edit');
    Route::patch('/{name}', 'UserController@update')->name('update');
});
Route::post('/parties/subscribes', 'PartyController@updateSubscribe');

Route::get('/password/edit', 'UserController@editPassword')->name('password.edit');
Route::patch('/password/update', 'UserController@updatePassword')->name('password.change');

Route::get('/api/parties/subscribe/index/{party_id}', 'PartyController@getSubscribeIndex')->middleware('auth');
