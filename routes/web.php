<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'NodeController@index')->name('home');
Route::get('/node/edit/{node}', 'NodeController@edit')->name('edit');
Route::put('/node/{node}', 'NodeController@update')->name('update');
Route::get('/node/create/{node}', 'NodeController@create')->name('create');
Route::post('/node', 'NodeController@store')->name('store');
Route::delete('/node/{node}', 'NodeController@destroy')->name('destroy');

// Route::get('/register', 'Auth\RegisterController@register');
