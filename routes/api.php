<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register', 'Api\AuthController@register');
Route::post('/login', 'Api\AuthController@login');

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/user', 'Api\UserProfileController@index');

    // ========= POSTS ROUTES =========
    Route::group(['prefix' => '/posts'], function () {
        Route::post('/', 'Api\PostsController@store');
        Route::get('/{post}', 'Api\PostsController@show');

        Route::group(['middleware' => 'MustOwn:post'], function () {
            Route::delete('/{post}', 'Api\PostsController@destroy');
        });
    });
    // ========= /POSTS ROUTES =========

    // ========= COMMENTS ROUTES =========
    Route::group(['prefix'  => '/comments'], function () {
        Route::post('/post/{post}', 'Api\CommentsController@store');
    });
    // ========= /COMMENTS ROUTES =========
});
