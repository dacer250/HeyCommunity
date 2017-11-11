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

//
// Home
Route::group([], function() {
    Route::get('/', 'HomeController@index')->name('home.index');
});


//
// User
Route::group(['prefix' => 'user'], function() {
    Route::get('logout', 'UserController@logout')->name('user.logout');
    Route::get('ucenter', 'UserController@ucenter')->name('user.ucenter');
    Route::get('uhome/{id}', 'UserController@uhome')->name('user.uhome');
});


//
// Notice
Route::group(['prefix' => 'notification'], function() {
    Route::get('/', 'NotificationController@index')->name('notification.index');
});


//
// Topic
Route::group(['prefix' => 'topic'], function() {
    Route::get('/', 'TopicController@index')->name('topic.index');
    Route::get('/{id}', 'TopicController@show')->name('topic.show')->where('id', '[0-9]+');
    Route::get('create', 'TopicController@create')->name('topic.create');
    Route::post('store', 'TopicController@store')->name('topic.store');
});


//
// Activity
Route::group(['prefix' => 'activity'], function() {
    Route::get('/', 'ActivityController@index');
    Route::get('/{id}', 'ActivityController@show')->name('activity.show');
});

