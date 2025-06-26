<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('index');
});
// Route::get('/login', function () {
//     return view('login');
// })->name('login');
// Route::get('/register', function () {
//     return view('register');
// });

//Register Account
Route::get('/register', [UserController::class, 'index'])->name('register');
Route::post('/register', [UserController::class, 'store']);
Route::get('/registers/{email}', [UserController::class, 'update']);

//Login Account
Route::get('/login', [AuthController::class, 'index'])->name('login');

//Dashboard
Route::get('/dashboard', [AuthController::class, 'dashboard'])->middleware('auth')->name('dashboard');
Route::post('login', [AuthController::class, 'auth']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
