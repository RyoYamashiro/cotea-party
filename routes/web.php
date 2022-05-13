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

Route::get('/', function () {
    return view('index');
})->name('index');
Route::get('/register', function(){
  return view('auth.register');
})->name('register');
Route::get('/mypage', function(){
  return view('mypage');
});

Route::get('/party/1', function(){
  return view('party');
});
