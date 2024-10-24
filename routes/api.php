<?php

use App\Http\Controllers\HeroiController;
use App\Http\Controllers\VilaoController;
use Illuminate\Support\Facades\Route;

Route::get('/heroi', [HeroiController::class, 'listarTodos']);
Route::get('/heroi/{id}', [HeroiController::class, 'listarPeloId']);
Route::post('/heroi', [HeroiController::class, 'criar']);
Route::put('/heroi/{id}', [HeroiController::class, 'editar']);
Route::delete('/heroi/{id}', [HeroiController::class, 'remover']);

Route::get('/vilao', [VilaoController::class, 'listarTodos']);
Route::get('/vilao/{id}', [VilaoController::class, 'listarPeloId']);
Route::post('/vilao', [VilaoController::class, 'criar']);
Route::put('/vilao/{id}', [VilaoController::class, 'editar']);
Route::delete('/vilao/{id}', [VilaoController::class, 'remover']);
