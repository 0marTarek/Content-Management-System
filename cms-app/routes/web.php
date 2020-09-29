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

Route::get('/', 'WelcomeController@index')->name('welcome');
Route::get('/posts/{id}/show', 'PostController@showPost')->name('showPost');
Route::post('/posts/{id}/show', 'postCommentController@show')->name('comments');


Auth::routes();

Route::group(['middleware' =>'auth'], function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource("/category","CategoryController");
    Route::resource('/posts','PostController');
    Route::resource('/tags', 'TagController');
    Route::get('/trashedPosts','PostController@TrashedPosts')->name('posts.trashedPosts');
    Route::get('/trashedPosts/{id}','PostController@RestoreTrashedPosts')->name('posts.RestoreTrashed');
    
    Route::get('/users/{user}/editeProfile','UsersController@EditeProfile')->name('users.editeProfile');
    Route::post('/users/{user}/editeProfile','UsersController@update')->name('users.update');
    Route::get('/users/{user}/all-posts', 'UsersController@allUserPosts')->name('users.allUserPosts');

});
Route::middleware(['auth', 'admin'])->group(function(){
    Route::get('/users', 'UsersController@index')->name('users.index');
    Route::post('/users/{id}/make-Admin', 'UsersController@MakeAdmin')->name('users.makeAdmin');
    Route::post('/users/{id}/remove-Admin', 'UsersController@RemoveAdmin')->name('users.removeAdmin');
    Route::get('/users/admins-only', 'UsersController@AdminsOnly')->name('users.AdminsOnly');
    Route::get('/dashboard','DashboardController@index')->name('dashboard.index');
});