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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'faculties'],function (){
    Route::get('/', 'FacultiesController@index');
    Route::get('/create', 'FacultiesController@create');
    Route::get('/{id}/edit', 'FacultiesController@edit');
    Route::get('/{id}', 'FacultiesController@show');
    Route::post('/', 'FacultiesController@store');
    Route::put('/{id}','FacultiesController@update');
    Route::delete('/{id}','FacultiesController@destroy');
    Route::get('/{id}/groups', 'FacultiesController@show_group');
    Route::post('/get-by-ajax','FacultiesController@getByAjax');

});
Route::group(['prefix' => 'groups'],function (){
    Route::get('/', 'GroupsController@index');
    Route::get('/create', 'GroupsController@create');
    Route::get('/{id}/edit', 'GroupsController@edit');
    Route::get('/{id}', 'GroupsController@show');
    Route::post('/', 'GroupsController@store');
    Route::put('/{id}','GroupsController@update');
    Route::delete('/{id}','GroupsController@destroy');
    Route::post('/get-by-ajax','GroupsController@getByAjax');
});
Route::group(['prefix' => 'students'],function (){
    Route::get('/', 'StudentsController@index');
    Route::get('/create', 'StudentsController@create');
    Route::get('/{id}/edit', 'StudentsController@edit');
    Route::get('/{id}', 'StudentsController@show');
    Route::post('/', 'StudentsController@store');
    Route::put('/{id}','StudentsController@update');
    Route::delete('/{id}','StudentsController@destroy');
    Route::post('/get-by-ajax','StudentsController@getByAjax');
    Route::post('/get-info-by-ajax','StudentsController@getInfoByAjax');
});

