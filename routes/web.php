<?php

use Illuminate\Support\Facades\Route;

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

//Route::apiResource("books", "BooksController");

Route::get('/libros/todos', 'BooksController@index');
Route::post('/libros/guardar', 'BooksController@store');
Route::put('/libros/actualizar', 'BooksController@update');
Route::delete('/libros/borrar/{id}', 'BooksController@destroy');
Route::get('/libros/buscar/{id}', 'BooksController@show');

