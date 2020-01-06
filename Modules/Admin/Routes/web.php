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

Route::prefix('authenticate')->group(function (){
    Route::get('/login', 'AdminAuthController@getLogin')->name('admin.login');
    Route::post('/login', 'AdminAuthController@postLogin');
    Route::get('/logout', 'AdminAuthController@logoutAdmin')->name('admin.logout');
});

Route::prefix('admin')->middleware('CheckLoginAdmin')->group(
    function () {

        Route::get('/', 'AdminController@index')->name('admin.home');

        Route::group(
            ['prefix' => 'category'],
            function () {
                Route::get('/', 'AdminCategoryController@index')->name('admin.get.list.category');

                Route::get('/create', 'AdminCategoryController@create')->name('admin.get.create.category');
                Route::post('/create', 'AdminCategoryController@store');

                Route::get('/update/{id}', 'AdminCategoryController@edit')->name('admin.get.edit.category');
                Route::post('/update/{id}', 'AdminCategoryController@update');

                Route::get('/{action}/{id}', 'AdminCategoryController@action')->name('admin.get.action.category');
            }
        );

        Route::group(
            ['prefix' => 'sub-category'],
            function () {
                Route::get('/', 'AdminSubCategoryController@index')->name('admin.get.list.sub_category');

                Route::get('/create', 'AdminSubCategoryController@create')->name('admin.get.create.sub_category');
                Route::post('/create', 'AdminSubCategoryController@store');

                Route::get('/update/{id}', 'AdminSubCategoryController@edit')->name('admin.get.edit.sub_category');
                Route::post('/update/{id}', 'AdminSubCategoryController@update');

                Route::get('/{action}/{id}', 'AdminSubCategoryController@action')->name('admin.get.action.sub_category');
            }
        );

        Route::group(
            ['prefix' => 'user'],
            function () {
                Route::get('/', 'AdminUserController@index')->name('admin.get.list.user');
            }
        );

        Route::group(
            ['prefix' => 'contact'],
            function () {
                Route::get('/', 'AdminContactController@index')->name('admin.get.list.contact');
                Route::get('/{action}/{id}', 'AdminContactController@action')->name('admin.action.contact');
            }
        );

        Route::group(
            ['prefix' => 'vocabulary'],
            function () {
                Route::get('/', 'AdminVocabularyController@index')->name('admin.get.list.vocabulary');
                Route::post('/ajax-select-sub-cate', 'AdminVocabularyController@ajaxSubCate')->name('admin.ajax_select_sub_cate.vocabulary');

                Route::get('/create', 'AdminVocabularyController@create')->name('admin.get.create.vocabulary');
                Route::post('/create', 'AdminVocabularyController@store');

                Route::get('/update/{id}', 'AdminVocabularyController@edit')->name('admin.get.edit.vocabulary');
                Route::post('/update/{id}', 'AdminVocabularyController@update');

                Route::get('/{action}/{id}', 'AdminVocabularyController@action')->name('admin.get.action.vocabulary');
            }
        );
    }
);
