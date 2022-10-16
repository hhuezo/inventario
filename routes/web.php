<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PedidoController;

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



Route::post('/eliminar_producto', [PedidoController::class, 'eliminar_producto'])->name('eliminar_producto');
Route::get('/detalle_producto/{id}',[PedidoController::class, 'listado_producto'])->name('listado_producto');
Route::resource('pedido', PedidoController::class);
