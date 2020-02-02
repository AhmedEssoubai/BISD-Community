<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => ['auth:api'], 'namespace' => 'Api'], function () {

    Route::get('/', function () {
        return ['route' => 'outsiders'];
    });

    Route::middleware('auth.group')->get('/{groupe}', function ($groupe) {
        return ['data'];
    });

    Route::group(['middleware' => 'auth.group'], function () {
        Route::get('/{groupe}/home', 'PostController@index');

        // Route::get('/{groupe}/post/{id}', 'PostController@index');
    });

    Route::middleware('auth.group', "auth.group.admin")->get('/{groupe}/admin', function ($groupe) {
        return ['route' => 'admin'];
    });


    /**
     * Groups Routes
     * 
     */

    Route::post('/groupe', 'GroupeController@store');

    /**
     * Posts Routes
     * 
     */
    Route::get('{groupe}/post', 'PostController@index');
    Route::post('{groupe}/post', 'PostController@store');
    Route::put('{groupe}/post/{id}', 'PostController@update');
    Route::get('{groupe}/post/{id}', 'PostController@show');
    Route::delete('{groupe}/post/{id}', 'PostController@destroy');
    Route::post('{groupe}/post/fav/{id}', 'PostController@favoriser');


    /**
     * Commets Routes
     * 
     */
    Route::get('{groupe}/comments/{post_id}', 'CommentController@index');
    Route::post('{groupe}/comments/{post_id}/{parent_comment_id?}', 'CommentController@store');
    Route::put('{groupe}/comments/{id}', 'CommentController@update');
    Route::get('{groupe}/comment/{id}', 'CommentController@show');
    Route::delete('{groupe}/comments/{id}', 'CommentController@destroy');

    /**
     * Groupe
     */
    Route::get('{groupe}/members/count', 'GroupeController@member_count');
});

Route::group(['namespace' => 'Auth'], function () {
    Route::post('/login', 'LoginController@login');
});
