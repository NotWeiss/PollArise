<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// URL ROUTING
Route::get('/', function () { return view('landing'); })->name('landing');
Route::get('/login', [AuthController::class, "login"])->name('login');
Route::get('/register', [AuthController::class, "register"])->name('register');


// POST METHODs ROUTING
Route::post('/login', [AuthController::class, "tryLogin"])->name('try.login');
Route::post('/register', [AuthController::class, "tryRegister"])->name('try.register');