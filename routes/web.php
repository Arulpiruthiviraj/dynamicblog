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

Route::get('/test', function () {
     return App\Tag::find(4)->posts;
});



Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::group(['prefix'=>'admin','middleware'=>'auth'], function () {

	Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/post', 'PostsController@index')->name('post.index');
    Route::get('/post/create', 'PostsController@create')->name('post.create');
    Route::post('/post/store', 'PostsController@store')->name('post.store');
    Route::get('/post/edit/{id}', 'PostsController@edit')->name('post.edit');
    Route::post('/post/update/{id}', 'PostsController@update')->name('post.update');
    Route::get('/post/delete/{id}', 'PostsController@destroy')->name('post.delete');
    Route::get('/post/trashes', 'PostsController@trash')->name('post.trash');
    Route::get('/post/kill/{id}', 'PostsController@kill')->name('post.kill');
    Route::get('/post/restore/{id}', 'PostsController@restore')->name('post.restore');

    Route::get('/category/create', 'CategoriesController@create')->name('category.create');
    Route::post('/category/store', 'CategoriesController@store')->name('category.store');
    Route::get('/category', 'CategoriesController@index')->name('category.index');
    Route::get('/category/delete/{id}', 'CategoriesController@destroy')->name('category.delete');
    Route::get('/category/edit/{id}', 'CategoriesController@edit')->name('category.edit');
    Route::post('/category/update/{id}', 'CategoriesController@update')->name('category.update');

    Route::get('/tags/create', 'TagsController@create')->name('tag.create');
    Route::post('/tags/store', 'TagsController@store')->name('tag.store');
    Route::get('/tags', 'TagsController@index')->name('tag.index');
    Route::get('/tags/delete/{id}', 'TagsController@destroy')->name('tag.delete');
    Route::get('/tags/edit/{id}', 'TagsController@edit')->name('tag.edit');
    Route::post('/tags/update/{id}', 'TagsController@update')->name('tag.update');
});
	




