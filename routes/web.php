<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/shoplist', 'ShoplistController@index');
Route::get('/shop/{id}', 'ShoptopController@index')->where('id', '[0-9]+');
Route::get('/search/{area_id}', 'ShopSearchController@index')->where('area_id', '[0-9]+');
Route::get('/search/{area_id}/{local_id}', 'ShopSearchController@index')
    ->where('area_id', '[0-9]+')
    ->where('local_id', '[0-9]+');
