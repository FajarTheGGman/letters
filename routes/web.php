<?php

use Illuminate\Support\Facades\Route;

// Include The Controller
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LetterController;
use App\Http\Controllers\AdminController;

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

Route::get('/', function(){
    return view('wellcome');
});

Route::prefix('auth')->group(function(){
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::get('/register', [AuthController::class, 'register'])->name('register');

    Route::post('/register', [AuthController::class, 'register_post'])->name('register-post');
    Route::post('/login', [AuthController::class, 'login_post'])->name('login-post');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::prefix('letter')->group(function(){
//    Route::get('/create')
});

Route::prefix('admin')->group(function(){
    Route::get('/', [AdminController::class, 'index'])->name('admin');
});
