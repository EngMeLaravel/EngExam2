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
Route::group(['namespace' => 'Auth'], function () {
    Route::get('dang-ky', 'RegisterController@getRegister')->name('get.register');
    Route::post('dang-ky', 'RegisterController@postRegister')->name('post.register');

    Route::get('xac-nhan-tai-khoan', 'RegisterController@verifyAccount')->name('user.verify.account');

    Route::get('dang-nhap', 'LoginController@getLogin')->name('get.login');
    Route::post('dang-nhap', 'LoginController@postLogin')->name('post.login');

    Route::get('dang-xuat', 'LoginController@getLogout')->name('get.logout.user');

    Route::get('/lay-lai-mat-khau','ForgotPasswordController@getFormResetPassword')->name('get.reset.password');
    Route::post('/lay-lai-mat-khau','ForgotPasswordController@sendCodeResetPassword');

    Route::get('/password/reset','ForgotPasswordController@resetPassword')->name('get.link.reset.password');
    Route::post('/password/reset','ForgotPasswordController@saveResetPassword');
});

Route::get('/', 'HomeController@index')->name('home');

Route::prefix('public-library')->group(function (){
    Route::get('/','PublicLibrary@index')->name('get.public_lib.index');
    Route::get('/{cate_id}-{subcate_id}-{word_id}','PublicLibrary@getVocaDetail')->name('get_detail_voca.public_lib.index');
    Route::get('/{cate_id}-{subcate_id}','PublicLibrary@getVocabularies')->name('get_vocabularies.public_lib.index');
    Route::get('/{id}','PublicLibrary@showSubCategories')->name('show_subcategory.public_lib.index');
});

Route::prefix('my-library')->middleware('CheckLoginUser')->group(function (){
    Route::get('/','MyLibrary@index')->name('get.my_lib.index');
    Route::post('/add-category','MyLibrary@add')->name('add.my_lib.index');
    Route::post('/edit-category','MyLibrary@save')->name('save.my_lib.index');
    Route::post('/delete-category','MyLibrary@delete')->name('delete.my_lib.index');

    Route::get('/show-mysubcategory/{id}','MyLibrary@show')->name('show_mysubcategory.my_lib.index');
    Route::post('/add-sub-cate-category','MyLibrary@addsubcate')->name('addsubcate.my_lib.index');
    Route::post('/edit-sub-cate-category','MyLibrary@savesubcate')->name('savesubcate.my_lib.index');
    Route::post('/delete-sub-cate-category','MyLibrary@deletesubcate')->name('deletesubcate.my_lib.index');
});


Route::post('/translate', 'HomeController@ajax_translate');
Route::post('/search', 'HomeController@ajax_search');
Route::get('/voca/{voca_name}','HomeController@voca');

Route::get('lien-he', 'ContactController@getContact')->name('get.contact');
Route::post('lien-he', 'ContactController@saveContact');
