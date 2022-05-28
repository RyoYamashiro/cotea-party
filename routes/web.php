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
Route::resource('/parties', 'PartyController')->except(['index', 'show'])->middleware('auth');
Route::resource('/parties', 'PartyController')->only(['show']);

Route::prefix('users')->name('users.')->group(function () {
    Route::get('/{name}', 'UserController@show')->name('show');
    Route::get('/{name}/edit', 'UserController@edit')->name('edit');
    Route::patch('/{name}', 'UserController@update')->name('update');
});
Route::get('/password/edit', 'UserController@editPassword')->name('password.edit');
Route::patch('/password/update', 'UserController@updatePassword')->name('password.change');


Route::get('/home', 'HomeController@index')->name('home');
