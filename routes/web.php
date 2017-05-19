<?php

Route::get('/', 'TicketController@welcome');

Route::get('/tickets', 'TicketController@create');
Route::post('/tickets', 'TicketController@store');
Route::get('/index', 'TicketController@index');
Route::get('/tickets/{id}/edit', 'TicketController@edit')->name('ticket.edit');
Route::put('/tickets/{id}', 'TicketController@update')->name('ticket.update');
Route::put('/tickets/{id}/mark-paid', 'TicketController@markPaid')->name('ticket.mark-paid');
Route::delete('/tickets/{id}', 'TicketController@destroy')->name('ticket.destroy');

Route::get('/waitList/create', 'WaitListController@create');
Route::post('/enterWait', 'WaitListController@store');
Route::get('/waitList', 'WaitListController@index');

Route::get('/goodbye', function () {
    return view ('Page.goodbye');
});

