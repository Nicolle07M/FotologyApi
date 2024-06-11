<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\clienteController;
use App\Http\Controllers\Api\fotografoController;
use App\Http\Controllers\Api\administradorController;

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

// API DEL ADMINISTRADOR //

Route::get('/administrador', [administradorController::class, 'index']);

Route::get('/administrador/{id}', [administradorController::class, 'show']);

Route::post('/administrador', [administradorController::class, 'store']);

Route::put('/administrador/{id}', [administradorController:: class, 'update']);

Route::patch('/administrador/{id}', [administradorController:: class, 'updatePartial']);

Route::delete('/administrador/{id}', [administradorController:: class, 'destroy']);