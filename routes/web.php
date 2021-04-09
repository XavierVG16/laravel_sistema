<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ArticuloController;




/*
|--------------------------------------------------------------------------
| Web Routes
|------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::resource('/categoria',App\Http\Controllers\CategoriaController::class);
Route::get('/categoria', [App\Http\Controllers\CategoriaController::class, 'index'])->name('categoria.index');
Route::post('/categoria', [App\Http\Controllers\CategoriaController::class, 'store'])->name('categoria.store');
Route::put('/categoria/actualizar', [App\Http\Controllers\CategoriaController::class, 'update'])->name('categoria.update');
Route::put('/categoria/activar', [App\Http\Controllers\CategoriaController::class, 'activar'])->name('categoria.activar');
Route::put('/categoria/desactivar', [App\Http\Controllers\CategoriaController::class, 'desactivar'])->name('categoria.desactivar');
Route::get('/categoria/selectCategoria', [App\Http\Controllers\CategoriaController::class, 'selectCategoria'])->name('categoria.select');
Route::put('/categoria', [App\Http\Controllers\CategoriaController::class, 'eliminar'])->name('categoria.eliminar');



    //Route::apiResource('/articulo', ArticuloController::class);
    Route::get('/articulo', [App\Http\Controllers\ArticuloController::class, 'index'])->name('articulo.index');

    Route::post('/articulo', [App\Http\Controllers\ArticuloController::class, 'store'])->name('articulo.store');
    Route::put('/articulo/actualizar', [App\Http\Controllers\ArticuloController::class, 'update'])->name('articulo.update');
    Route::put('/articulo/desactivar', [App\Http\Controllers\ArticuloController::class, 'desactivar'])->name('articulo.desactivar');
    Route::get('/articulo/listarPdf',  [App\Http\Controllers\ArticuloController::class, 'listarPdf'])->name('articulos_pdf');
    Route::put('/articulo/activar', [App\Http\Controllers\ArticuloController::class, 'activar'])->name('articulo.activar');
    Route::put('/articulo', [App\Http\Controllers\ArticuloController::class, 'destroy'])->name('articulo.destroy');

    Route::get('/cliente', [App\Http\Controllers\ClienteController::class, 'index'])->name('cliente.index');
    Route::post('/cliente/resgistrar', [App\Http\Controllers\ClienteController::class, 'store'])->name('cliente.store');
    Route::put('/cliente/actualizar', [App\Http\Controllers\ClienteController::class, 'update'])->name('cliente.update');
    
    Route::get('/proveedor', [App\Http\Controllers\ProveedorController::class, 'index'])->name('proveedor.index');
    Route::post('/proveedor/registrar',[App\Http\Controllers\ProveedorController::class, 'store'])->name('proveedor.store');
    Route::put('/proveedor/actualizar', [App\Http\Controllers\ProveedorController::class, 'update'])->name('proveedor.update');
    Route::get('/proveedor/selectProveedor', [App\Http\Controllers\ProveedorController::class, 'selectProveedor'])->name('proveedor.selectProveedor');

    Route::get('/ingreso', [App\Http\Controllers\IngresoController::class, 'index'])->name('Ingreso.index');
    Route::post('/ingreso/registrar',  [App\Http\Controllers\IngresoController::class, 'store'])->name('Ingreso.store');
    Route::put('/ingreso/desactivar',  [App\Http\Controllers\IngresoController::class, 'desactivar'])->name('Ingreso.desactivar');
    Route::get('/ingreso/obtenerCabecera',  [App\Http\Controllers\IngresoController::class, 'obtenerCabecera'])->name('Ingreso.obtenerCabecera');
    Route::get('/ingreso/obtenerDetalles',  [App\Http\Controllers\IngresoController::class, 'obtenerDetalles'])->name('Ingreso.obtenerDetalles');



//Route::resource('/books', BooksController::class);

