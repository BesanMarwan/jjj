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



#Auth::routes();
Route::group(['namespace'=>'Front'],function(){

   Route::get('/',            'HomeController@index')        ->name('front.home');
   Route::get('category/{id}','HomeController@showCategory') ->name('front.category');
   Route::get('post/{id}',    'HomeController@getPost')      ->name('front.post');
   Route::get('search/',      'HomeController@search')       ->name('front.search');
   Route::get('/contact',     'ContactController@getContact')->name('front.getContact');
   Route::get('/contact-us',  'ContactController@contact')   ->name('front.contact');
   Route::get('/{slug}',      'HomeController@staticPage')   ->name('front.static');

});


