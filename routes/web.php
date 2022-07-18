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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Auth::routes();

//メールとパスワードでログインした場合の変遷先を指定
Route::get('/user/profile', 'PageController@mypage')->name('user/profile');


/*
|--------------------------------------------------------------------------
| 1) User 認証不要
|--------------------------------------------------------------------------
*/
//Route::get('/', function () { return redirect('/home'); });
Route::get('/', 'PageController@info');
Route::get('movie/search', 'PageController@search');
Route::get('movie/detail', 'PageController@detail');

/*
|--------------------------------------------------------------------------
| 2) User ログイン後
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => 'auth:user'], function() {
    //Route::get('/', 'HomeController@info')->name('home');
    Route::get('profile', 'PageController@mypage');
    
    
});
 
/*
|--------------------------------------------------------------------------
| 3) Admin 認証不要
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'admin'], function() {
    Route::get('/', function () { return redirect('/admin/index'); });
    Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Admin\LoginController@login');
});
 
/*
|--------------------------------------------------------------------------
| 4) Admin ログイン後
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
    Route::post('logout', 'Admin\LoginController@logout')->name('admin.logout');
    Route::get('index', 'Admin\HomeController@index')->name('admin.index');
});



/* 自作Routing */
 

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
    Route::get('movie/create', 'Admin\MovieController@add');
    Route::post('movie/create', 'Admin\MovieController@create');
    Route::get('movie', 'Admin\MovieController@info');
    //Route::get('movie/search', 'Admin\MovieController@search');
    Route::get('movie/edit', 'Admin\MovieController@edit');
    Route::post('movie/edit', 'Admin\MovieController@update');
    Route::get('movie/delete', 'Admin\MovieController@delete');
    Route::get('movie/get', 'Admin\MovieController@showGetMovies');
    Route::get('movie/getpage', 'Admin\MovieController@getMovies');
    
    Route::get('user', 'Admin\UserController@info');
    Route::get('user/delete', 'Admin\UserController@delete');
    
    Route::get('comment', 'Admin\HomeController@comment');
    Route::get('comment/delete', 'Admin\HomeController@commentDelete');
    
});

Route::group(['prefix' => 'user', 'middleware' => 'auth:user'], function() {
    Route::get('profile/create', 'User\ProfileController@add'); 
    Route::post('profile/create', 'User\ProfileController@create');
    //Route::get('profile', 'User\ProfileController@info');
    Route::get('profile', 'PageController@mypage');
    Route::get('profile/edit', 'User\ProfileController@edit');
    Route::post('profile/edit', 'User\ProfileController@update');
    Route::get('profile/delete', 'User\ProfileController@delete');
    
    Route::get('comments', 'User\CommentController@info');
    Route::get('comment/edit', 'User\CommentController@edit')->name("edit.comment");
    Route::post('comment/edit', 'User\CommentController@update');
    Route::get('comment/delete', 'User\CommentController@delete');
    
    Route::post('comments', 'User\CommentController@create');
    Route::get('comment', 'User\CommentController@add');
    
    Route::post('/', 'User\CommentController@scoreCreate');
    
    
    Route::get('recommend', 'User\RecommendController@info');
    
    Route::get('/', 'User\RecommendController@store');
    Route::get('recommend/destroy', 'User\RecommendController@destroy');
});



/* Socialite */
Route::prefix('auth')->group(function () {
    Route::get('twitter', 'AuthController@login');
    Route::get('twitter/callback', 'AuthController@callback');
});