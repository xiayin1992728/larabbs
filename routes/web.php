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
Route::get('users/{user}','UsersController@show')->name('users.show');