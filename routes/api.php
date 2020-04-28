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

        Route::group(['middleware' => 'MustOwn:comment'], function () {
            Route::delete('/{comment}', 'Api\CommentsController@destroy');
        });
    });
    // ========= /COMMENTS ROUTES =========

    // ========= LIKES ROUTES =========
    Route::group(['prefix'  => '/likes'], function () {
        Route::post('/post/{post}', 'Api\LikesController@likePost');
        Route::post('/comment/{comment}', 'Api\LikesController@likeComment');

        Route::group(['middleware' => 'MustOwn:like'], function () {
            Route::delete('/{like}', 'Api\LikesController@destroy');
        });
    });
    // ========= /LIKES ROUTES =========
});
