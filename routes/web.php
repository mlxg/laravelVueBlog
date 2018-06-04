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

Route::get('/', function () {
    return redirect('/blog');
});
Route::get('/home', 'HomeController@index')->name('home');

//blog
Route::get('blog', 'BlogController@index');
Route::get('blog/{slug}', 'BlogController@showPost');

//admin
Route::get('admin', function () {
    return redirect('/admin/post');
});

Route::group(['namespace' =>'Admin','middleware'=>'auth'],function(){
    Route::resource('admin/post', 'PostController', ['except' => 'show']);
//    Route::resource('admin/post/store', 'PostController@store');
    Route::resource('admin/tag','TagController',['except' => 'show']);
    Route::get('admin/upload','uploadController@index');

});

// 登录、注销
Route::get('auth/login','Auth\AuthController@getLogin');
Route::post('auth/login','Auth\AuthController@getLogin');
Route::get('auth/logout','Auth\AuthController@logout');





