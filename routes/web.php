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

//Authentication,Authorization
Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');


//Home
Route::get('/', 'HomeController@index');


//Blog
Route::get('blog/', 'Blog\BlogController@index');
Route::get('blog/category/{category}', 'Blog\BlogController@index')->where('category', '[0-9]+');
Route::get('blog/{article}', 'Blog\BlogController@show')->where('article', '[0-9]+');
Route::get('/category/{category}/articles', 'Blog\BlogController@show_articles')->where('category', '[0-9]+');


//Portfolio
Route::get('portfolio/', 'Portfolio\PortfolioController@index');
Route::get('portfolio/{portfolio}', 'Portfolio\PortfolioController@show')->where('portfolio', '[0-9]+');
Route::get('portfolio/category/{category}', 'Portfolio\PortfolioController@show_by_category')->where('category', '[0-9]+');


//Contact
Route::get('/contact', 'Contact\ContactController@index');
Route::post('/contact', 'Contact\ContactController@index');

//About us
Route::get('/about', 'About\AboutController@index');

//Comment
Route::post('comment/store', 'CommentController@store');


//Admin
Route::get('admin/', 'Admin\DefaultController@index');

//Admin User
Route::get('admin/users', 'Admin\UserController@index');
Route::get('admin/user/{user}', 'Admin\UserController@show')->where('user', '[0-9]+');
Route::get('admin/users/create', 'Admin\UserController@create');
Route::get('admin/user/{user}/edit/' , 'Admin\UserController@edit')->where('user', '[0-9]+');
Route::post('admin/user/store', 'Admin\UserController@store');
Route::post('admin/user/update', 'Admin\UserController@update');
Route::post('admin/user/delete', 'Admin\UserController@delete');

//Admin Article
Route::get('admin/articles', 'Admin\ArticleController@index');
Route::get('admin/article/{article}', 'Admin\ArticleController@show')->where('article', '[0-9]+');
Route::get('admin/articles/create', 'Admin\ArticleController@create');
Route::get('admin/articles/{article}/edit/' , 'Admin\ArticleController@edit')->where('article', '[0-9]+');
Route::post('admin/article/store', 'Admin\ArticleController@store');
Route::post('admin/article/update', 'Admin\ArticleController@update');
Route::post('admin/article/delete', 'Admin\ArticleController@delete');

//Admin Portfolio
Route::get('admin/portfolios', 'Admin\PortfolioController@index');
Route::get('admin/portfolio/{portfolio}', 'Admin\PortfolioController@show')->where('portfolio', '[0-9]+');
Route::get('admin/portfolios/create', 'Admin\PortfolioController@create');
Route::get('admin/portfolios/{portfolio}/edit/' , 'Admin\PortfolioController@edit')->where('portfolio', '[0-9]+');
Route::post('admin/portfolio/store', 'Admin\PortfolioController@store');
Route::post('admin/portfolio/update', 'Admin\PortfolioController@update');
Route::post('admin/portfolio/delete', 'Admin\PortfolioController@delete');

//Admin Media
Route::get('admin/media', 'Admin\MediaController@index');
Route::get('admin/media/{media}', 'Admin\MediaController@show')->where('media', '[0-9]+');
Route::get('admin/media/create', 'Admin\MediaController@create');
Route::get('admin/media/{media}/edit/' , 'Admin\MediaController@edit')->where('media', '[0-9]+');
Route::post('admin/media/store', 'Admin\MediaController@store');
Route::post('admin/media/update', 'Admin\MediaController@update');
Route::post('admin/media/delete', 'Admin\MediaController@delete');

//Admin Category
Route::get('admin/categories', 'Admin\CategoryController@index');
Route::get('admin/category/{category}', 'Admin\CategoryController@show')->where('category', '[0-9]+');
Route::get('admin/category/{category}/articles', 'Admin\CategoryController@show_articles_by_category')->where('category', '[0-9]+');

Route::get('admin/categories/create', 'Admin\CategoryController@create');
Route::get('admin/categories/{category}/edit/' , 'Admin\CategoryController@edit')->where('category', '[0-9]+');
Route::post('admin/category/store', 'Admin\CategoryController@store');
Route::post('admin/category/update', 'Admin\CategoryController@update');
Route::post('admin/category/delete', 'Admin\CategoryController@delete');


//Admin Comment
Route::get('admin/comments', 'Admin\CommentController@index');
Route::get('admin/comments/{comment}/edit/' , 'Admin\CommentController@edit')->where('comment', '[0-9]+');
Route::post('admin/comment/update', 'Admin\CommentController@update');
Route::post('/admin/comment/approve', 'Admin\CommentController@approve');
Route::post('/admin/comment/delete', 'Admin\CommentController@delete');