<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControladorInicioSesion;


Route::get('/', function () {
    return view('plantillas.inicio_sesion');
});

Route::post('iniciar_sesion',[ControladorInicioSesion::class,'iniciar_sesion'])->name('login');

Route::post('crear_mensaje',[ControladorInicioSesion::class,'crear_mensaje'])->name('crear_nuevo_mensaje');

Route::get('cerrar_session',[ControladorInicioSesion::class,'cerrar_session'])->name('salir');