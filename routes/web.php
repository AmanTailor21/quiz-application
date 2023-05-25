<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/  
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/login/admin', 'App\Http\Controllers\Auth\LoginController@showAdminLoginForm');
Route::get('/login/examers', 'App\Http\Controllers\Auth\LoginController@showExamersLoginForm');
Route::get('/register/admin', 'App\Http\Controllers\Auth\RegisterController@showAdminRegisterForm');
Route::get('/register/examers', 'App\Http\Controllers\Auth\RegisterController@showExamersRegisterForm');

Route::post('/login/admin', 'App\Http\Controllers\Auth\LoginController@adminLogin');
Route::post('/login/examers', 'App\Http\Controllers\Auth\LoginController@examersLogin');
Route::post('/register/admin', 'App\Http\Controllers\Auth\RegisterController@createAdmin');
Route::post('/register/examers', 'App\Http\Controllers\Auth\RegisterController@createExamers');

Route::middleware(['guest:admin'])->group(function () {
  Route::view('/admin', 'admin');
  Route::get('/addQuestions', 'App\Http\Controllers\QuestionsController@addQuestions')->name('addQuestions');
  Route::post('/storeQuestions', 'App\Http\Controllers\QuestionsController@storeQuestions')->name('storeQuestions');
  Route::get('/fetchQuestions', 'App\Http\Controllers\QuestionsController@fetchQuestions')->name('fetchQuestions');

  Route::get('/addOptions', 'App\Http\Controllers\OptionsController@addOptions')->name('addOptions');
  Route::post('/storeOptions', 'App\Http\Controllers\OptionsController@storeOptions')->name('storeOptions');

  Route::get('/addAnswer', 'App\Http\Controllers\AnswerController@addAnswer')->name('addAnswer');
  Route::get('/fetchOptions', 'App\Http\Controllers\AnswerController@fetchOptions')->name('fetchOptions');
  Route::post('/storeAnswer', 'App\Http\Controllers\AnswerController@storeAnswer')->name('storeAnswer');

  Route::get('/quiz/{id}', 'App\Http\Controllers\quizController@getQuestions');
});

Route::middleware(['guest:examers'])->group(function () {
  Route::view('/examers', 'examers');
});

Route::view('/home', 'home')->middleware('auth');
