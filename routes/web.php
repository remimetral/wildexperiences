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
Route::get('/activities', ['as' => 'activities-en', 'uses' => 'AppController@activities']);
Route::get('/pack', ['as' => 'pack-en', 'uses' => 'AppController@pack']);
Route::get('/calendar', ['as' => 'calendar-en', 'uses' => 'AppController@calendar']);
Route::get('/location', ['as' => 'location-en', 'uses' => 'AppController@location']);

Route::get('/accueil', ['as' => 'home-fr', 'uses' => 'AppController@home']);
Route::get('/activites', ['as' => 'activities-fr', 'uses' => 'AppController@activities']);
Route::get('/meute', ['as' => 'pack-fr', 'uses' => 'AppController@pack']);
Route::get('/calendrier', ['as' => 'calendar-fr', 'uses' => 'AppController@calendar']);
Route::get('/localisation', ['as' => 'location-fr', 'uses' => 'AppController@location']);

Route::post('changelocale', ['as' => 'changelocale', 'uses' => 'AppController@changeLocale']);

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
