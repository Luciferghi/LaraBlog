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
//Authentication routes

Route::get('auth/login',['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
Route::post('auth/login','Auth\LoginController@Login');
Route::get('auth/logout', 'Auth\LoginController@logout')->name('logout');

//registering ROutes

Route::get('auth/register','Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('auth/register','Auth\RegisterController@Register');

// Password Reset Routes...

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');





Route::get('blog/{slugs}',['as' => 'blog.single','uses' => 'BlogController@getSingle'])->where('slugs','[\w\d\-\_]+');

Route::get('blog',['as' => 'blog.index','uses' => 'BlogController@getIndex']);

Route::get('about','PagesController@getAbout');

Route::get('contact', 'PagesController@getContact');

Route::get('/', 'PagesController@getIndex');

Route::resource('posts','PostController');


