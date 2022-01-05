<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//user routes

Route::group(['namespace' => 'User'], function () {
    Route::get('/', 'HomeController@index');
    Route::get('post/{post}', 'PostController@post')->name('post');

    Route::get('category/{category}', 'HomeController@category')->name('category');
    Route::get('tag/{tag}', 'HomeController@tag')->name('tag');

    // vue routes
    Route::post('getPosts', 'PostController@getAllPosts');
    Route::post('saveLike', 'PostController@saveLike');

});

//admin routes
Route::group(['namespace' => 'Admin', 'middleware' => 'auth:admin'], function () {
    Route::get('admin/home', 'HomeController@index')->name('admin.home');
    Route::resource('admin/user', 'UserController');
    Route::resource('admin/post', 'PostController');
    Route::resource('admin/tag', 'TagController');
    Route::resource('admin/category', 'CategoryController');
    Route::resource('admin/role', 'RoleController');
    Route::resource('admin/permission', 'PermissionController');
});
Route::group(['namespace' => 'Admin'], function () {
    // admin login
    Route::get('admin-login', 'Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('admin-login', 'Auth\LoginController@login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
