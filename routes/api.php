<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\clienteController;

Route::get('/cliente', [clienteController::class, 'index']);

Route::get('/cliente/{id}', [clienteController::class, 'show']);

Route::post('/cliente', [clienteController::class, 'store']);

Route::put('/cliente/{id}', [clienteController:: class, 'update']);

Route::patch('/cliente/{id}', [clienteController:: class, 'updatePartial']);

Route::delete('/cliente/{id}', [clienteController:: class, 'destroy']);