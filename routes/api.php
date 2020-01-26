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
    
        Route::middleware( 'auth.group' )->get( '/{groupe}', function ($groupe) {
            return ['data'];
        });

        Route::group(['middleware' => 'auth.group'], function () {
            Route::get('/{groupe}/home', 'PostController@index');

            // Route::get('/{groupe}/post/{id}', 'PostController@index');
        });
        
        Route::middleware('auth.group',"auth.group.admin")->get('/{groupe}/admin', function ($groupe) {
            return ['route' => 'admin'];
        });
    
});

Route::group(['namespace' => 'Api'], function () {
    // Creation Test Routes
    Route::post('{groupe}/post', 'PostController@store');
});

