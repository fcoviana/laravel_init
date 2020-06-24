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

// Route::get('/imoveis/remover/{id}', 'ImovelController@remover')->name('imoveis.remove');


Route::get('/produtos/remove/{id}', 'ProdutoController@remover')->name('produtos.remove');
Route::resource('produtos', 'ProdutoController');
 
Route::get('/marcas/produtos/{id}', 'MarcaController@produtos')->name('marcas.produtos');
Route::get('/marcas/remove/{id}', 'MarcaController@remover')->name('marcas.remove');
Route::resource('marcas', 'MarcaController');
 
Route::get('/categorias/produtos/{id}', 'CategoriaController@produtos')->name('categorias.produtos');
Route::get('/categorias/remove/{id}', 'CategoriaController@remover')->name('categorias.remove');
Route::resource('categorias', 'CategoriaController');
