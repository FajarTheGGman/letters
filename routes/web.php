<?php

use Illuminate\Support\Facades\Route;

// Include The Controller
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LetterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UsersController;

use App\Models\Notify;

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
    Route::get('/', [LetterController::class, 'index'])->name('create-letter');
    Route::get('/template', [LetterController::class, 'template'])->name('template-letter');
    Route::get('/send', [LetterController::class, 'send'])->name('send-letter');
    Route::post('/send', [LetterController::class, 'send_post'])->name('send-post-letter');

    Route::get('/inbox', [LetterController::class, 'inbox'])->name('inbox-letter');
    Route::get('/inbox/{id}', [LetterController::class, 'inbox_overview'])->name('inbox-overview-letter');
    Route::get('/inbox/delete/{id}', [LetterController::class, 'inbox_delete'])->name('inbox-delete');

    Route::post('/search', [LetterController::class, 'search'])->name('search-letter');

    Route::post('/create/custom', [LetterController::class, 'create'])->name('create');
    Route::get('/delete/{id}', [LetterController::class, 'delete'])->name('delete-letter');
    Route::get('/overview/{id}', [LetterController::class, 'overview'])->name('overview-letter');
});

Route::prefix('users')->group(function(){
    Route::get('/', [UsersController::class, 'index'])->name('dashboard');
    Route::get('/profile', [UsersController::class, 'profile'])->name('profile');
});

Route::prefix('admin')->group(function(){
    Route::get('/', [AdminController::class, 'index'])->name('admin');
    Route::get('/adduser', [AdminController::class, 'adduser'])->name('addadmin');
    Route::get('/role', [AdminController::class, 'role'])->name('admin-role');
    Route::get('/role/delete/{id}', [AdminController::class, 'role_delete'])->name('admin-role-delete');
    Route::post('/role', [AdminController::class, 'role_post'])->name('admin-role-post');
    Route::post('/addadmin', [AdminController::class, 'newAdmin'])->name('newadmin');

});

Route::fallback(function(){
    if(Session::get('firstname')){
        return view('error.404', ['notify' => Notify::all()]);
    }else{
        return "none";
    }
});
