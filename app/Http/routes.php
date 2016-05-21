<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/


Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/', 'PortalController@index');
    Route::get('news', 'PortalController@showallnews');
    Route::get('news/{id}', 'PortalController@shownewsrecord');
    Route::get('interviews', 'PortalController@showallinterviews');
    Route::get('interview/{id}', 'PortalController@showinterview');
    Route::get('category/{id}', 'PortalController@newscategory');

    Route::get('admin', 'Admin\AdminController@index');
    Route::resource('admin/users', 'Admin\UserController');
    Route::resource('admin/newscategories', 'Admin\NewsCategoryController');
    Route::resource('admin/news', 'Admin\NewsController');
    Route::resource('admin/interviews', 'Admin\InterviewsController');


    Route::post('news/{id}/addcomment', 'CommentsController@store');
});