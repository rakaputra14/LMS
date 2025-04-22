<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InstructorsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckRole;

Route::get('/', function () {
    return view('login');
});
Route::get('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::post('actionLogin', [LoginController::class, 'actionLogin']);

// route::middleware(middleware: ['auth'])->group(function () {
//     Route::resource('dashboard', DashboardController::class);
// });

// Route::middleware(['auth', CheckRole::class . ':Super Admin'])->group(function () {
//     Route::resource('users', UserController::class);
// });

// Route::middleware(['auth', CheckRole::class . ':Super Admin,Admin,PIC'])->group(function () {
//     Route::resource('majors', MajorController::class);
//     Route::resource('instructors', InstructorsController::class);
// });

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('users', UserController::class);
    Route::resource('majors', MajorController::class);
    Route::resource('instructors', InstructorsController::class);
    Route::resource('students', StudentController::class);
});
