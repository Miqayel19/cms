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

    Route::get('admin/user/news', 'NewsController@index');
    Route::get('admin/user/news/create', 'NewsController@create');
    Route::post('admin/user/news', 'NewsController@store');

    Route::get('admin/user/news/{id}', 'NewsController@show');

    Route::put('admin/users/{id}', 'UsersController@update');
    Route::delete('admin/users/{id}','UsersController@destroy');

    Route::get('admin/tickets', 'UsersController@tickets');
    Route::post('admin/tickets/get-by-ajax','UsersController@getTicketsByAjax');
    Route::delete('admin/tickets/{id}','UsersController@destroy_ticket');

    Route::get('user/support', 'SupportController@index');
    Route::get('user/support/new_ticket', 'SupportController@create');
    Route::post('user/support', 'SupportController@store');

});



Route::get('/login', 'Auth\LoginController@index')->name('login');
Route::get('/logout', 'Auth\LoginController@logout');
Route::post('/login', 'Auth\LoginController@login');
Route::get('/signup', 'Auth\RegisterController@index');


Route::post('/send', 'UsersController@send_sms');
Route::get('/verify', 'Auth\RegisterController@verify');
Route::post('/check_verify', 'Auth\RegisterController@check_verify');
Route::get('/404', 'Auth\LoginController@error');






