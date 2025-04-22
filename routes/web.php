<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InstructorsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('login');
});
Route::get('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::post('actionLogin', [LoginController::class, 'actionLogin']);

route::middleware(['auth'])->group(function () {
    Route::resource('dashboard', DashboardController::class);
    Route::resource('users', UserController::class);
    Route::resource('majors', MajorController::class);
    Route::resource('instructors', InstructorsController::class);

});
