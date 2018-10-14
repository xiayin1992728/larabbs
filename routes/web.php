<?php

Route::get('/','PagesController@root')->name('root');

//Authentication Routes...
Route::get('login','Auth\LoginController@showLoginForm')->name('login');
Route::post('login','Auth\LoginController@login');
Route::post('logout','Auth\LoginController@logout')->name('logout');

//Registrantion Routes...
Route::get('register','Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register','Auth\RegisterController@register');

//Password Reset Routes...
Route::get('password/reset','Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('pasword/email','Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reseet/{token}','Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset','Auth\ResetPasswordController@reset');

//Users Routes
// Route::get('users/{user}/show','UsersController@show')->name('users.show');
// Route::get('users/{user}/edit','UsersController@edit')->name('users.edit');
Route::resource('users','UsersController');

Route::resource('topics', 'TopicsController', ['only' => ['index', 'create', 'store', 'update', 'edit', 'destroy']]);
Route::get('topics/{topic}/{slug?}','TopicsController@show')->name('topics.show');
Route::resource('categories','CategoriesController',['only'=>['show']]);

Route::post('upload_image','TopicsController@uploadImage')->name('topics.upload_image');
Route::resource('replies', 'RepliesController', ['only' => ['store','destroy']]);