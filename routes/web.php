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

Route::get('/enter', 'TicketController@create');
Route::post('/enter', 'TicketController@store');
Route::get('/index', 'TicketController@index');
Route::get('/enter/{id}/edit', 'TicketController@edit');
Route::put('/enter/{id}', 'TicketController@update')->name('ticket.update');

Route::get('/waitList', 'WaitListController@create');
Route::post('/waitList', 'WaitListController@store');
Route::get('/waitList', 'WaitListController@index');

Route::get('/enterWait', function () {
    return view ('enterWait');
});
