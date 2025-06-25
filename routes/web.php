<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('index');
});
Route::get('/login', function () {
    return view('login');
})->name('login');
// Route::get('/register', function () {
//     return view('register');
// });

//Register Account
Route::get('/register', [UserController::class, 'index'])->name('register');
Route::post('/register', [UserController::class, 'store']);
Route::get('/registers/{email}', [UserController::class, 'update']);
