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
    return view('welcome');
});


Auth::routes();

Route::get('/login/google', 'Auth\LoginController@googleRedirect');

Route::get('/login/google/callback', 'Auth\LoginController@receiveDataGoogle');


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/produtos/cadastrar', 'ProductController@viewform')->Middleware('checkuser');

Route::post('/produtos/cadastrar', 'ProductController@create')->Middleware('checkuser');

Route::get('/produtos/atualizar/{id?}', 'ProductController@viewFormUpdate')->Middleware('checkuser');

Route::post('/produtos/atualizar', 'ProductController@update')->Middleware('checkuser');

Route::get('/produtos', 'ProductController@viewAllProducts')->Middleware('checkuser');

Route::get('/produtos/deletar/{id}', 'ProductController@delete')->Middleware('checkuser');
