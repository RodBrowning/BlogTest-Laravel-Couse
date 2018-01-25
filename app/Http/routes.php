<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Authenticate User Routes
Route::get('auth/login',['as' => 'login', 'uses' => 'Auth\AuthController@getLogin']);
Route::post('auth/login',['as' => 'post.login', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('auth/logout',['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);

// Register User Routes
Route::get('auth/register',['as' => 'get.register', 'uses' => 'Auth\AuthController@getRegister']);
Route::post('auth/register',['as' => 'post.register', 'uses' => 'Auth\AuthController@postRegister']);

// Reset Password Routes
Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
Route::post('password/reset', 'Auth\PasswordController@reset');

// Category Routes
Route::resource('category','CategoryController',['except'=>['show']]);

// Tag Routes
Route::resource('tag','TagController',['except'=>'create']);

Route::get('blog/{slug}' , ['as' => 'blog.single', 'uses' => 'BlogController@getSingle']);
Route::get('blog', ['uses'=>'BlogController@getIndex', 'as'=>'blog.index']);
	
Route::get('contact', 'PagesController@getContact');
Route::get('about', 'PagesController@getAbout');
Route::get('/','PagesController@getHome');

Route::resource('posts','PostController');


/*Route::get('/', function () {
    return view('welcome');
});*/
