<?php




Route::group(['middleware' => 'auth'], function () {

    Route::get('/admin', function () {

        return view('admin.app');
    });

    Route::get('admin/users', 'UsersController@index');
    Route::get('admin/users/profile', 'UsersController@create');
    Route::get('admin/users/new-user','UsersController@show_new_user');
    Route::put('admin/users', 'UsersController@update_data');
    Route::get('admin/users/{id}', 'UsersController@show');
    Route::get('admin/users/{id}/edit', 'UsersController@edit');

    Route::post('admin/users', 'UsersController@store');
    Route::post('admin/users/get-by-ajax','UsersController@getByAjax');

    Route::get('user/news', 'NewsController@index');
    Route::get('user/news/create', 'NewsController@create');
    Route::post('user/news', 'NewsController@store');
    Route::get('admin/users/{id}/news', 'NewsController@show');



    Route::put('admin/users/{id}', 'UsersController@update');
    Route::delete('admin/users/{id}','UsersController@destroy');

    Route::get('admin/tickets', 'TicketsController@index');\
    Route::post('admin/tickets/get-by-ajax','TicketsController@getTicketsByAjax');
    Route::get('admin/tickets/{id}', 'TicketsController@show');
    Route::get('admin/tickets/{id}/edit', 'TicketsController@edit');
    Route::put('admin/tickets/{id}', 'TicketsController@update');
    Route::delete('admin/tickets/{id}','TicketsController@destroy');

    Route::get('user/support', 'SupportController@index');
    Route::get('user/support/new_ticket', 'SupportController@create');
    Route::post('user/support', 'SupportController@store');
    Route::post('user/support/tickets/get-by-ajax','SupportController@getTicketsByAjax');
    Route::delete('user/support/tickets/{id}','SupportController@destroy');

});



Route::get('/login', 'Auth\LoginController@index')->name('login');
Route::get('/logout', 'Auth\LoginController@logout');
Route::post('/login', 'Auth\LoginController@login');
Route::get('/signup', 'Auth\RegisterController@index');


Route::post('/send', 'UsersController@send_sms');
Route::get('/verify', 'Auth\RegisterController@verify');
Route::post('/check_verify', 'Auth\RegisterController@check_verify');
Route::get('/404', 'Auth\LoginController@error');






