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

Route::get('/', 'PagesController@posts');
Route::get('/posts', 'PagesController@posts');

Route::get('/posts/{post}', 'PagesController@post');


Route::post('/posts/{id}/store', 'CommentsController@store');


Route::get('/category/{name}', 'PagesController@category');
Route::post('/search', 'PagesController@search');




//Auth
Route::get('/register', 'RegisterationController@create');
Route::post('/register', 'RegisterationController@store');


Route::get('/login', 'SessionsController@create');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy');

Route::get('/statistics', 'PagesController@statistics');
Route::get('/access-denied', 'PagesController@accessDenied');



Route::group(['middleware' => 'roles' , 'roles' =>'Admin'], function(){

    Route::get('/admin', 'PagesController@admin');
    Route::post('/add-role', 'PagesController@addRole');
    Route::post('/settings', 'PagesController@settings');
    Route::post('/add-category', 'PagesController@addCategory');
    
});

Route::group(['middleware' => 'roles' , 'roles' =>['Editor','Admin']], function(){
    Route::post('/posts/store', 'PagesController@store');
    //Route::post('/add-role', 'PagesController@addRole');
    
});

Route::group(['middleware' => 'roles' , 'roles' =>['User','Editor','Admin']], function(){

    Route::post('/like', 'PagesController@like')->name('like');
    Route::post('/dislike', 'PagesController@dislike')->name('dislike');
    
});