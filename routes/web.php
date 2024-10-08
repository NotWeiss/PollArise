<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ChoiceController;
use Illuminate\Support\Facades\Route;

// Welcome Routes
Route::get('/', function () { return view('landing'); })->
        name('landing');

Route::get('/login', [AuthController::class, 'login'])->
        name('login');

Route::get('/register', [AuthController::class, 'register'])->
        name('register');


///////////////////////////////////////////////////////////////////////


// Auth Routes
Route::post('/login', [AuthController::class, 'tryLogin'])->
        name('try.login');

Route::post('/register', [AuthController::class, 'tryRegister'])->
        name('try.register');

Route::get('/home', [DashboardController::class, 'arrive'])->
        name('home');


///////////////////////////////////////////////////////////////////////


// Dashboard Routes
Route::post('/surveys', [DashboardController::class, 'createSurvey'])->
        name('survey.create');


///////////////////////////////////////////////////////////////////////


// Edit Survey Routes
Route::match(['get', 'post'], '/surveys/{survey}', 
        [SurveyController::class, 'openSurvey'])->
        name('survey.open');

Route::put('/surveys/{survey}', 
        [SurveyController::class, 'updateDetails'])->
        name('survey.update');


///////////////////////////////////////////////////////////////////////


// Question Routes
Route::post('/surveys/{survey}', 
        [QuestionController::class, 'createQuestion'])->
        name('question.create');

Route::put('/surveys/{survey}/questions/{question}', 
        [QuestionController::class, 'updateQuestion'])->
        name('question.update');

Route::delete('/surveys/{survey}/questions/{question}', 
        [QuestionController::class, 'destroyQuestion'])->
        name('question.destroy');


///////////////////////////////////////////////////////////////////////


//Choices Routes
Route::post('/surveys/{survey}/questions/{question}', 
        [ChoiceController::class, 'createChoice'])->
        name('choice.create');

Route::put('/surveys/{survey}/questions/{question}/choices/{choice}', 
        [ChoiceController::class, 'updateChoice'])->
        name('choice.update');

Route::match(['get', 'delete'], '/surveys/{survey}/questions/'.
       '{question}/choices/{choice}', [ChoiceController::class, 
       'destroyChoice'])->name('choice.destroy');