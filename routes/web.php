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

Route::get('/sistema', 'InformacionController@contador')->name('tienda');

Route::group(['middleware' => ['auth']], function () {

    Route::resource('/productos', 'ProductoController');
    Route::delete('/fotos/{foto}', 'FiltradoController@eliminar_foto')->name('fotos.destroy');
    Route::get('/informacion-pagina', 'InformacionController@editar_info')->name('info.edit');
    Route::put('/informacion-pagina/actualizar/{id}', 'InformacionController@update_info')->name('info.update');
});

Route::get('/', 'TiendaController@index')->name('inicio.tienda');
Route::get('producto/{id}', 'TiendaController@informacion')->name('info.producto');
Route::get('/productos/categoria/{categoria}', 'FiltradoController@filtrado_categoria')->name('filtro.categoria');
Route::post('productos/resultados-de-la-busqueda', 'FiltradoController@busqueda')->name('filtro.termino');

Auth::routes();
