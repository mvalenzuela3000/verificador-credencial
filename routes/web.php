<?php

use App\Http\Controllers\CredencialController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/personal/{codigo}', [CredencialController::class, 'verificar'])
    ->name('credenciales.verificar')
    ->middleware('throttle:60,1');
