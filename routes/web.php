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
Route::get('/mypage', function(){
  return view('mypage');
});
Route::get('/{any}', function(){
    return view('App');
})->where('any', '.*');

Route::get('/party/1', function(){
  return view('parties.party');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
