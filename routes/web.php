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

Route::get('/', 'HomeController@index')->name('home');

Route::prefix('public-library')->group(function (){
    Route::get('/','PublicLibrary@index')->name('get.public_lib.index');
    Route::get('/show-subcategory/{id}','PublicLibrary@show')->name('show_subcategory.public_lib.index');
    Route::post('/edit-category','PublicLibrary@save')->name('save.public_lib.index');
    Route::post('/delete-category','PublicLibrary@delete')->name('delete.public_lib.index');
});
Route::prefix('my-library')->group(function (){
    Route::get('/','MyLibrary@index')->name('get.my_lib.index');
//    Route::get('/add-category','MyLibrary@add')->name('add_my_categ');
//    Route::post('/edit-category','MyLibrary@save')->name('save.my_lib.index');
//    Route::get('/delete-category','MyLibrary@delete')->name('get.my_lib.index');
});
Route::post('/translate', 'HomeController@ajax_translate');
