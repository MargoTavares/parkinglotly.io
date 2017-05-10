<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tickets', 'TicketController@create');
Route::post('/tickets', 'TicketController@store');
Route::get('/index', 'TicketController@index');
Route::get('/tickets/{id}/edit', 'TicketController@edit')->name('ticket.edit');
Route::put('/tickets/{id}', 'TicketController@update')->name('ticket.update');
Route::delete('/tickets/{id}', 'TicketController@destroy')->name('ticket.destroy');

Route::get('/waitList/create', 'WaitListController@create');
Route::post('/enterWait', 'WaitListController@store');
Route::get('/waitList', 'WaitListController@index');

Route::get('/exit', 'TicketController@index');

Route::get('/goodbye', function () {
    return view ('goodbye');
});

