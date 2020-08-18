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



//Route::get('/admin/login','admincontroller@admin')->middleware('auth:admins')->name('adminlogin');
//Route::post('/admin/login','admincontroller@check');




//Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
    Route::group(['prefix'=>'/dash'],function()
    {
        Route::get('/','admincontroller@admin')-> middleware ('auth')->name('log');
    Route::post('/','admincontroller@check')-> name('logsave');
    Route::get('/cat','admincontroller@addcat')->name('addcat');
    Route::post('/cat','admincontroller@savecat')-> name('savecat');
    Route::get('/show','admincontroller@showcat')->name('showcat');
    Route::get('/show/{id}','admincontroller@destory')->name('deletecat');
    Route::get('/editecat/{id}','admincontroller@editecat')->name('editecat');
    Route::put('/editecat/{id}','admincontroller@updatecat')->name('updatecat');
    Route::get('/product','admincontroller@add_product')->name('addproduct');
    Route::post('/product','admincontroller@save_product')-> name('saveproduct');
    Route::get('/showproduct','admincontroller@show_product')->name('showproduct');
    Route::post('/showproduct','admincontroller@show_product')->name('showproduct');
    Route::get('/seal','admincontroller@deletproduct')->name('deletproduct');
    Route::post('/seal','admincontroller@order')->name('deletproduct');
    Route::get('/map','admincontroller@maps')->name('maps');
    Route::get('/logout','admincontroller@login')->name('logouts');
    
    
    });
    Route::group(['prefix'=>'/'],function()
    {
        Route::get('/','usercontroller@index')->name('index');
        Route::get('/try','usercontroller@trys')->name('try');

    Route::get('/login','admincontroller@login')->name('login');
   
     Auth::routes();
    });
});

/*

Route::get('','admincontroller@admin')-> middleware('auth:web')->name('log');
Route::post('','admincontroller@check')->name('logsave');

Route::get('/login','admincontroller@login')->name('login');