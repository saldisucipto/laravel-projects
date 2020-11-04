<?php

// Todo Route 
Route::get('/', 'TodoController@index');
Route::match(['get', 'post'], '/todo/create', 'TodoController@create');
Route::match(['get', 'put'], '/todo/{id}','TodoController@show');
//Route::get('/todo/print', 'TodoController@print');
Route::get('/todo/print/todo', 'TodoController@print');


Route::get('/todo/delete/{id}', 'TodoController@delete');