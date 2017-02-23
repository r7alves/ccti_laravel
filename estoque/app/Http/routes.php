<?php

Route::get('/','ProdutoController@lista');

Route::get('/produtos','ProdutoController@lista');
Route::get('/produtos/mostra/{id}','ProdutoController@mostra');
Route::get('/produtos/remove/{id}','ProdutoController@remove');
Route::get('/produtos/novo','ProdutoController@novo');
Route::post('/produtos/adiciona','ProdutoController@adiciona');
Route::get('/produtos/json', 'ProdutoController@listaJson');

Route::get('/login', 'LoginController@form');
Route::post('/login', 'LoginController@login');



Route::get('/produtos/edit/{id}','ProdutoController@edit');
Route::post('/produtos/alterar/{id}','ProdutoController@alterar');

/*Route::get('/', 'WelcomeController@index');*/

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
