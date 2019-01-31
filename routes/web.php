<?php


Route::group(['middleware' => 'auth'], function () {

    Route::get('/admin', function () {
        return view('admin.app');
    });
    Route::group(['prefix' => 'admin/users'], function () {
        Route::get('/', 'UsersController@index');
        Route::get('/profile', 'UsersController@create');
        Route::get('/new-user', 'UsersController@show_new_user');
        Route::put('/', 'UsersController@update_data');
        Route::get('/{id}', 'UsersController@show');
        Route::get('/{id}/edit', 'UsersController@edit');
        Route::put('/{id}', 'UsersController@update');
        Route::delete('/{id}', 'UsersController@destroy');
        Route::post('/', 'UsersController@store');
        Route::post('/get-by-ajax', 'UsersController@getByAjax');
    });

    Route::group(['prefix' => 'admin/tickets'], function () {
        Route::get('/', 'TicketsController@index');
        Route::post('/get-by-ajax', 'TicketsController@getTicketsByAjax');
        Route::post('/', 'TicketsController@store');
        Route::get('/create', 'TicketsController@create');
        Route::get('/{id}', 'TicketsController@show');
        Route::get('/{id}/edit', 'TicketsController@edit');
        Route::put('/{id}', 'TicketsController@update');
        Route::delete('/{id}', 'TicketsController@destroy');
    });

    Route::group(['prefix' => 'user/support'], function () {
        Route::get('/', 'SupportController@index');
        Route::get('/new_ticket', 'SupportController@create');
        Route::post('/', 'SupportController@store');
        Route::post('/tickets/get-by-ajax', 'SupportController@getTicketsByAjax');
        Route::post('/get-by-ajax', 'SupportController@getSupportByAjax');
        Route::get('/tickets/{id}', 'SupportController@answer');
        Route::delete('/tickets/{id}', 'SupportController@destroy');
    });

    Route::get('user/news', 'NewsController@index');
    Route::get('user/news/create', 'NewsController@create');
    Route::post('user/news', 'NewsController@store');
    Route::get('admin/users/{id}/news', 'NewsController@show');


});

Route::get('/login', 'Auth\LoginController@index')->name('login');
Route::get('/logout', 'Auth\LoginController@logout');
Route::post('/login', 'Auth\LoginController@login');
Route::get('/signup', 'Auth\RegisterController@index');


Route::post('/send', 'UsersController@send_sms');
Route::get('/verify', 'Auth\RegisterController@verify');
Route::post('/check_verify', 'Auth\RegisterController@check_verify');
Route::get('/404', 'Auth\LoginController@error');






