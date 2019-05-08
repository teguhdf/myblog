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


  $posts = App\Post::all();
  $posts2 = App\Post::orderBy('id', 'desc')->paginate(2);
  $categories = App\Category::paginate(4);
  $tags = App\Tag::paginate(4);
  return view('welcome')->withPosts($posts)->withCategories($categories)->withTags($tags)->withPosts2($posts2);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/about', 'AboutController@index')->name('about');
Route::get('/contact', 'ContactController@index')->name('contact');

Route::resource('posts', 'PostController');

Route::resource('category', 'CategoryController');

Route::resource('tags', 'TagController');

Route::post('search', 'SearchController@search')->name('search');
