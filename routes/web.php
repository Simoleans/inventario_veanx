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
    return view('login.login');
})->name('login');

//** login //
Route::post('/login','Auth\LoginController@login')->name('auth');
Route::get('/logout','Auth\LoginController@logout')->name('logout');


Route::group(['middleware' => ['auth','active']], function () {
	
	Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');

	Route::resource('/usuarios','UserController',['names' => 'user']);
	Route::resource('producto', ProductoController::class);

	Route::resource('tipo', TipoController::class)->only([
	    'index', 'store','edit','update','create'
	]);

	Route::resource('combo', ComboController::class)->only([
	    'index', 'store','edit','update','create'
	]);

	Route::get('informes','ReporteController@index')->name('reporte.index');
	Route::post('informe/inventario','ReporteController@inventario')->name('reporte.inventario');
	Route::post('informe/movimiento','ReporteController@movimientos')->name('reporte.movimiento');

	Route::get('inventario','InventarioController@index')->name('inventario.index');

	Route::get('combo/productos/{id}','ComboController@add_productos')->name('combo.add-product');
	Route::post('combo/productos','ComboController@store_productos')->name('combo.store_productos');
	Route::delete('combo/productos/delete','ComboController@delete_productos')->name('combo.delete_productos');

	Route::get('movimiento/lista','MovimientoController@index')->name('movimiento.index');
	Route::get('movimiento/ingreso/combo/{combo}', 'MovimientoController@ingreso_combo')->name('movimiento.ingreso_combo');
	Route::post('movimiento/store/combo','MovimientoController@store_ingreso_combo')->name('store.ingreso.combo');
	Route::get('movimiento/ingreso/producto/{producto}', 'MovimientoController@ingreso_producto')->name('movimiento.ingreso_producto');
	Route::post('movimiento/store/producto','MovimientoController@store_ingreso_producto')->name('store.ingreso.producto');

	Route::get('movimiento/egreso/combo/{combo}', 'MovimientoController@egreso_combo')->name('movimiento.egreso_combo');
	Route::post('movimiento/store/egreso/combo','MovimientoController@store_egreso_combo')->name('store.egreso.combo');
	Route::get('movimiento/egreso/producto/{producto}', 'MovimientoController@egreso_producto')->name('movimiento.egreso_producto');
	Route::post('movimiento/store/producto','MovimientoController@store_egreso_producto')->name('store.egreso.producto');

	Route::resource('marca', MarcaController::class)->only([
	    'index', 'store','edit','update','create'
	]);

	Route::resource('pack', PackController::class)->only([
	    'index', 'store','edit','update','create'
	]);

	Route::resource('atributo', AtributoController::class)->only([
	    'index', 'store','edit','update','create'
	]);

});

