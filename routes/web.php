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
    return redirect('shoplist/');
});

Route::get('/shop/{id}/', 'ShoptopController@index')->where('id', '[0-9]+');
Route::get('/shoplist/', 'ShoplistController@index');
Route::get('/shoplist/', function () {
    return redirect('shoplist/1/');
});

Route::get('/shoplist/{area_id}/{local_id?}/', 'ShoplistController@index')
    ->where('area_id', '[0-9]+')
    ->where('local_id', '[0-9]+')
    ->name('shoplist.show');

Route::post('/shopsearch/', 'ShoplistController@search');
Route::get('/shopsearch', 'ShoplistController@search');
