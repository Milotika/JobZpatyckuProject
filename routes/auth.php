<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;


Route::get('/rejestracja', [RegisteredUserController::class, 'create'])
                ->name('rejestracja');

Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/logowanie', [AuthenticatedSessionController::class, 'create'])
                ->middleware('guest')
                ->name('logowanie');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
                ->middleware('guest');             

Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->middleware('auth')
                ->name('logout');                

?>