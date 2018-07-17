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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//crud articles inser , update delete
Route::get('article','ArticleController@index')->name('articles');
Route::get('add-article','ArticleController@create')->name('add:article');
Route::post('article','ArticleController@store')->name('store:article');
Route::get('edit-article/{id}','ArticleController@edit')->name('edit:article');
Route::post('article/{id}','ArticleController@update')->name('update:article');
Route::get('article/{id}','ArticleController@destroy')->name('destroy');

// show article details
Route::get('article-detail/{id}','ArticleController@detail')->name('details');
// article like or dislike
Route::get('like/{id}','ArticleController@unlike')->name('like');
//get article like user name 
Route::get('likes/{id}','ArticleController@likeList')->name('user:like');

//comment edit
Route::post('comment/{id}','ArticleController@comment')->name('comment');
//Route::get('comment/{id}','ArticleController@commentList')->name('comment:list');
Route::post('replay/{id}','ArticleController@replay')->name('replay');

//reply list
Route::get('reply/{id}','ArticleController@reply')->name('replay:list');

Route::post('load-article','ArticleController@loadDataAjax')->name('loadarticle');



