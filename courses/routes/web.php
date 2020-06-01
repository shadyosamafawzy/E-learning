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

Route::get('/', 'Welcome@index')->name('frontend.home');
Route::get('category/{id}', 'Welcome@category')->name('category.index');
Route::get('skill/{id}', 'Welcome@skill')->name('skill.index');
Route::get('tag/{id}', 'Welcome@tag');
Route::get('video/{id}', 'Welcome@video');
Route::namespace('BackEnd')->prefix('admin')->middleware('admin')->group(function (){
    Route::get('home','Home@index')->name('home');

  Route::resource('users','Users')->except(['show']);
  Route::resource('categories','Categories')->except(['show']);
  Route::resource('skills','Skills')->except(['show']);
  Route::resource('tags','Tags')->except(['show']);
  Route::resource('pages','Pages')->except(['show']);
  Route::resource('messages','Messages')->only(['index','destroy']);
  Route::resource('videos','Videos')->except(['show']);
  Route::post('comments','Videos@commentStore')->name('comment.store');
  Route::delete('comments/{id}','Videos@commentDestroy')->name('comment.destroy');
  Route::post('comments/{id}','Videos@commentUpdate')->name('comment.update');
  Route::post('message/reply/{id}','Messages@reply')->name('message.reply');

});

Route::middleware('auth')->group(function (){
    Route::post('comment/{id}', 'Welcome@commentUpdate');
    Route::post('comment/create/{id}', 'Welcome@commentStore');
});

Route::get('contactUs' , 'BackEnd\Messages@show')->name('contactUs');
Route::post('contactUs/store' , 'BackEnd\Messages@store')->name('messageStore');




























Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
