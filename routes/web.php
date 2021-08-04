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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/maestro', [App\Http\Controllers\HomeController::class, 'maestro'])->name('maestro');
Route::get('/tallerista', [App\Http\Controllers\HomeController::class, 'tallerista'])->name('tallerista');
Route::get('/Tallerista/inicio', [App\Http\Controllers\Tallerista\SesionController::class, 'index'])->name('index'); 

Route::group(['namespace' => 'Tallerista','prefix'=>'Tallerista','middleware'=>'auth'], function () {
    Route::get('index',[App\Http\Controllers\Tallerista\SesionController::class,'index']);
    Route::get('buscar/{id}',[App\Http\Controllers\Tallerista\SesionController::class,'buscar']);
    Route::get('obtener_ultimo',[App\Http\Controllers\Tallerista\SesionController::class,'obtener_ultimo']);
    Route::get('obtener_ultima_respuesta',[App\Http\Controllers\Tallerista\SesionController::class,'obtener_ultima_respuesta']);
    Route::get('mostrar/{id_lista}',[App\Http\Controllers\Tallerista\SesionController::class,'mostrar']);
    Route::get('mostrar_lista_usuario/{id_usuario}',[App\Http\Controllers\Tallerista\SesionController::class,'mostrar_lista_usuario']);
    Route::get('mostrar_lista_usuario_detalle/{id_usuario}',[App\Http\Controllers\Tallerista\SesionController::class,'mostrar_lista_usuario_detalle']);
    Route::post('insertar_lista',[App\Http\Controllers\Tallerista\SesionController::class,'insertar_lista']);
    Route::post('actualizar_lista',[App\Http\Controllers\Tallerista\SesionController::class,'actualizar_lista']);
    Route::post('insertar_lista_tallerista',[App\Http\Controllers\Tallerista\SesionController::class,'insertar_lista_tallerista']);
    Route::post('insertar_respuesta',[App\Http\Controllers\Tallerista\SesionController::class,'insertar_respuesta']);
});


Route::get('/dashboard',[App\Http\Controllers\Administrador\AdministradorController::class,'index']);
Route::get('/maestro',[App\Http\Controllers\Administrador\AdministradorController::class,'maestro']);
Route::get('/getDatosTallerista/{id}/{sesion}',[App\Http\Controllers\Administrador\AdministradorController::class,'getDatosTallerista']);
Route::get('/getDatosTallerista2/{id}',[App\Http\Controllers\Administrador\AdministradorController::class,'getDatosTallerista2']);
Route::get('/getDatosTallerista3/{id}/{sesion}',[App\Http\Controllers\Administrador\AdministradorController::class,'getDatosTallerista3']);
