<?php



Route::get('/admin', function () {

    return view('admin.app');
});


Route::get('/users/profile', 'UsersController@create');
Route::post('/users/profile', 'UsersController@store');


Route::get('admin/users', 'UsersController@index');
Route::post('admin/users', 'UsersController@store');


Route::get('admin/users/new-user','UsersController@create');
Route::post('admin/users/new-user','UsersController@new_user');


Route::get('admin/news', 'UsersController@news');
Route::post('admin/users/get-by-ajax','UsersController@getByAjax');
Route::get('admin/news/{id}', 'UsersController@show_news');


Route::get('admin/users/{id}', 'UsersController@show');
Route::get('admin/users/{id}/edit', 'UsersController@edit');
Route::put('admin/users/{id}', 'UsersController@update');
Route::delete('admin/users/{id}','UsersController@destroy');



Route::get('admin/tickets', 'UsersController@tickets');
Route::post('admin/tickets/get-by-ajax','UsersController@getTicketsByAjax');
Route::delete('admin/tickets/{id}','UsersController@destroy_ticket');


Route::get('/login', 'Auth\LoginController@index');
Route::get('/logout', 'Auth\LoginController@logout');
Route::post('/login', 'Auth\LoginController@login');
Route::get('/signup', 'Auth\RegisterController@index');


Route::post('/send', 'UsersController@send_sms');
Route::get('/404', 'Auth\LoginController@error');



