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


//Home Page
Route::get('/', 'HomeController@index');


//Authentication,Authorization
Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');


//Blog Pages
Route::group(['prefix'=>'blog','namespace' => 'Blog'], function() {
    Route::get('/', 'BlogController@index');
    Route::get('/{article}', 'SinglePostController@index')->where('article', '[0-9]+');
    Route::get('/category/{id}', 'CategoryPostController@index')->where('id', '[0-9]+');
});

//Portfolio Page
Route::group(['prefix'=>'portfolio','namespace' => 'Portfolio'], function() {
    Route::get('/', 'PortfolioController@index');
    Route::get('/{item}', 'SinglePortfolioController@index');
    Route::get('/category/{id}', 'CategoryPortfolioController@index');
});

//About and Contact Page
Route::get('/contact', 'Contact\ContactController@index');
Route::post('/contact', 'Contact\ContactController@sendMail');

Route::get('/about', 'About\AboutController@index');

//Admin Page
Route::group(['prefix'=>'admin','namespace' => 'Admin'], function() {

    Route::get('/', 'AdminController@index');

//Admin User Pages
    Route::get('/users', 'UserController@users');
    Route::match(['get', 'post'],'/user/add', 'UserController@usersAdd');

//Admin Article Pages
    Route::get('/articles', 'AdminController@viewAllArticle');
    Route::get('/articles/add', 'AdminController@addArticleIndex');

});




//Admin Portfolio Pages