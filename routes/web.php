<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [MessageController::class, 'index']);

Route::get('/register', [AuthController::class, 'showRegisterForm']);
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/login', [AuthController::class, 'showLoginForm']);
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/message', [MessageController::class, 'store'])->name('message_store')->middleware('auth');
Route::post('/offensive/{message}', [MessageController::class, 'offensive'])->name('message_offensive')->middleware('auth');
Route::get('/profile/{user_id}', [UserController::class, 'show'])->name('users.show');

Route::get('/admin', [MessageController::class, 'adminViewOffensive'])->middleware('admin');
Route::post('/remove_offensive/{message}', [MessageController::class, 'removeOffensiveFlag'])->name('messages.remove_offensive');
Route::delete('/delete_message/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');
