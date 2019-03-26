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

// Diary
Route::get('/diary/search', 'DiaryController@search')->name('search');
Route::post('/diary/search/results', 'DiaryController@results')->name('results');
Route::get('/diary', 'DiaryController@index')->name('index');
Route::get('/diary/create', 'DiaryController@create')->name('create');
Route::post('/diary/store', 'DiaryController@store')->name('store');
Route::get('/diary/{id}', 'DiaryController@show')->name('show');
Route::get('/diary/{id}/destroy', 'DiaryController@destroy')->name('destroy');
Route::get('/diary/{id}/edit', 'DiaryController@edit')->name('edit');
Route::post('/diary/{id}/update', 'DiaryController@update')->name('update');

// Address Book
Route::get('/addressbook', 'AddressBookController@index')->name('index');
Route::get('/addressbook/create', 'AddressBookController@create')->name('create');
Route::post('/addressbook/store', 'AddressBookController@store')->name('store');
Route::get('/addressbook/{id}', 'AddressBookController@show')->name('show');
Route::get('/addressbook/{id}/destroy', 'AddressBookController@destroy')->name('destroy');
Route::get('/addressbook/{id}/edit', 'AddressBookController@edit')->name('edit');
Route::post('/addressbook/{id}/update', 'AddressBookController@update')->name('update');






