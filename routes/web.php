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
    return view('homepage');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/diary/search', 'DiaryController@search')->name('search');
Route::post('/diary/search/results', 'DiaryController@results')->name('results');
Route::get('/diary', 'DiaryController@index')->name('index');
Route::get('/diary/create', 'DiaryController@create')->name('create');
Route::post('/diary/store', 'DiaryController@store')->name('store');
Route::get('/diary/{id}', 'DiaryController@show')->name('show');
Route::get('/diary/{id}/destroy', 'DiaryController@destroy')->name('destroy');
Route::get('/diary/{id}/edit', 'DiaryController@edit')->name('edit');
Route::post('/diary/{id}/update', 'DiaryController@update')->name('update');



