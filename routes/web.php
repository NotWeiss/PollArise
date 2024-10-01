<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SurveyController;
use App\Models\Survey;
use Illuminate\Support\Facades\Route;

// URL ROUTING
Route::get('/', function () { return view('landing'); })->name('landing');
Route::get('/login', [AuthController::class, "login"])->name('login');
Route::get('/register', [AuthController::class, "register"])->name('register');
Route::get('/home', [SurveyController::class, "arrive"])->name('home');


// POST METHODs ROUTING
Route::post('/login', [AuthController::class, "tryLogin"])->name('try.login');
Route::post('/register', [AuthController::class, "tryRegister"])->name('try.register');

// POST METHODs DASHBOARD
Route::post('/create-survey', [SurveyController::class, "createSurvey"])->name('create.survey');