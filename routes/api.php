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

Route::group(['middleware' => 'auth:api', 'namespace' => 'Api'], function () {

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

    Route::get('{groupe}/post', 'PostController@index');
    Route::post('{groupe}/post', 'PostController@store');
    Route::put('{groupe}/post/{id}', 'PostController@update');
    Route::get('{groupe}/post/{id}', 'PostController@show');
    Route::delete('{groupe}/post/{id}', 'PostController@destroy');

    Route::get('{groupe}/comments/{post_id}', 'CommentController@index');
    Route::post('{groupe}/comments/{post_id}/{parent_comment_id?}', 'CommentController@store');
    Route::put('{groupe}/comments/{id}', 'CommentController@update');
    Route::get('{groupe}/comment/{id}', 'CommentController@show');
    Route::delete('{groupe}/comments/{id}', 'CommentController@destroy');
});

// Route::group(['namespace' => 'Api'], function () {
//     // Creation Test Routes
//     Route::get('{groupe}/post', 'PostController@store');
// });
