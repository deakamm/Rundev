<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;

Auth::routes(['register'=>false,'reset'=>false]);//autenticación por seguridad

Route::get('/', function () {
    return view('auth.login');
});

Route::resource('empleado', EmpleadoController::class)->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [EmpleadoController::class, 'index'])->name('home');
});