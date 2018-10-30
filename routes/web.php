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

Route::get('blog/{slugs}',['as' => 'blog.single','uses' => 'BlogController@getSingle'])->where('slugs','[\w\d\-\_]+');

Route::get('about','PagesController@getAbout');

Route::get('contact', 'PagesController@getContact');

Route::get('/', 'PagesController@getIndex');

Route::resource('posts','PostController');


