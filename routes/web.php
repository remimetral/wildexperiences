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

Route::get('/', ['as' => 'splash', 'uses' => 'AppController@splash']);

Route::get('/home', ['as' => 'home-en', 'uses' => 'AppController@home']);
Route::get('/about', ['as' => 'about-en', 'uses' => 'AppController@about']);

Route::get('/accueil', ['as' => 'home-fr', 'uses' => 'AppController@home']);
Route::get('/a-propos', ['as' => 'about-fr', 'uses' => 'AppController@about']);

Route::post('changelocale', ['as' => 'changelocale', 'uses' => 'AppController@changeLocale']);

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
