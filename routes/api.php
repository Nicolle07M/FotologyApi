<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\clienteController;
use App\Http\Controllers\Api\fotografoController;

//API DEL CLIENTE//

Route::get('/cliente', [clienteController::class, 'index']);

Route::get('/cliente/{id}', [clienteController::class, 'show']);

Route::post('/cliente', [clienteController::class, 'store']);

Route::put('/cliente/{id}', [clienteController:: class, 'update']);

Route::patch('/cliente/{id}', [clienteController:: class, 'updatePartial']);

Route::delete('/cliente/{id}', [clienteController:: class, 'destroy']);

// API DEL FOTOGRAFO //

Route::get('/fotografo', [fotografoController::class, 'index']);

Route::get('/fotografo/{id}', [fotografoController::class, 'show']);

Route::post('/fotografo', [fotografoController::class, 'store']);

Route::put('/fotografo/{id}', [fotografoController:: class, 'update']);

Route::patch('/fotografo/{id}', [fotografoController:: class, 'updatePartial']);

Route::delete('/fotografo/{id}', [fotografoController:: class, 'destroy']);