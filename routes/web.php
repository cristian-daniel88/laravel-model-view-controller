<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\FormCreateBook;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SendReviewController;
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

Route::get('/', [LoginController::class, 'index']);


Route::post('/', [LoginController::class, 'login']);



Route::get('/home', [AppController::class, 'index']);


Route::get('/book', [AppController::class, 'book']);

Route::post('/book', [SendReviewController::class, 'add']);


Route::get('/community', function () {
    return view('community');
});


Route::get('/support', function () {
    return view('support');
});

Route::get('/create', [FormCreateBook::class, 'index']);

Route::post('/create', [FormCreateBook::class, 'store']);

