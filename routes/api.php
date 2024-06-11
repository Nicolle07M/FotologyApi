<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\clienteController;

Route::get('/cliente', [clienteController::class, 'index']);


Route::get('/cliente/{id}', function () {
    return 'obteniendo un cliente';
});

Route::post('/cliente', function () {
    return 'creando cliente';
});

Route::put('/cliente/{id}', function () {
    return 'actualizando cliente';
});

Route::delete('/cliente/{id}', function () {
    return 'eliminando cliente';
});