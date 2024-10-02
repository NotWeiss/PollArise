<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\ChoiceController;
use Illuminate\Support\Facades\Route;

// URL ROUTING
Route::get('/', function () { return view('landing'); })->name('landing');
Route::get('/login', [AuthController::class, "login"])->name('login');
Route::get('/register', [AuthController::class, "register"])->name('register');
Route::get('/home', [SurveyController::class, "arrive"])->name('home');


// POST METHODs ROUTING
Route::post('/login', [AuthController::class, "tryLogin"])->name('try.login');
Route::post('/register', [AuthController::class, "tryRegister"])->name('try.register');

// Survey Routes
Route::post('/create-survey', [SurveyController::class, "createSurvey"])->name('create.survey');
Route::post('/edit-survey/{survey}', [SurveyController::class, "editSurvey"])->name('edit.survey');
Route::get('/edit-survey/{survey}', [SurveyController::class, "editSurvey"])->name('edit.survey');
Route::put('/edit-survey/{survey}', [SurveyController::class, "update"])->name('update.survey');


// Questions Routes
Route::post('/edit-survey/{survey}/questions', [QuestionController::class, "createQuestion"])->name('create.question');
Route::put('/edit-survey/{survey}/questions/{question}', [QuestionController::class, "update"])->name('update.questions');
Route::delete('/edit-survey/{survey}/questions/{question}', [QuestionController::class, "destroy"])->name('destroy.questions');

// Options Routes
Route::post('/edit-survey/{survey}/questions/{question}/choices', [ChoiceController::class, 'createChoice'])->name('create.choice');
Route::put('/edit-survey/{survey}/questions/{question}/choices/{choice}', [ChoiceController::class, "update"])->name('update.choice');
Route::delete('/edit-survey/{survey}/questions/{question}/choices/{choice}', [ChoiceController::class, "destroy"])->name('destroy.choice');