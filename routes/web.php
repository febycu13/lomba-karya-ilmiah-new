<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MakalahController;

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
Route::get('/change-password', [UserController::class, 'IndexChangePassword'])->name('change-password');
Route::post('/change-password', [UserController::class, 'StoreChangePassword']);

//Makalah
Route::get('/makalah', [MakalahController::class, 'index'])->name('makalah');
Route::delete('/makalah/{makalah}', [MakalahController::class, 'delete']);

