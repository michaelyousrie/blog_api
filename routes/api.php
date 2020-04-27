<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register', 'Api\AuthController@register');
Route::post('/login', 'Api\AuthController@login');

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/user', 'Api\UserProfileController@index');

    Route::post('/posts', 'Api\PostsController@store');
    Route::get('/posts/{post}', 'Api\PostsController@show');

    Route::group(['middleware' => 'MustOwn:post'], function () {
        Route::delete('/posts/{post}', 'Api\PostsController@destroy');
    });
});
