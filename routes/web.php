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
Route::get('/mypage', function(){
  return view('mypage');
});

Route::get('/party/1', function(){
  return view('party');
});
