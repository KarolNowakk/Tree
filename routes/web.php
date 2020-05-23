<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/node_children', 'NodeController@index');
Route::post('/node', 'NodeController@store');
Route::delete('/node/{node}', 'NodeController@delete');
Route::put('/node/{node}', 'NodeController@update');
