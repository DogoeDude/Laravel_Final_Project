<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\register_form;
use App\Http\Controllers\MyAuthController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('LRpage');
})->name('LRpage');

route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

route::get('/view_form', [register_form::class, 'viewform'])->name('view_form');
route::post('/register_user', [MyAuthController::class, 'registerUser']);
Route::post('/login', [MyAuthController::class, 'checkCredentials'])->name('login');
route::get('/logout', [MyAuthController::class, 'loggingout']);
route::get('profile', [MyAuthController::class, 'profile']);

route::post('/task', [TaskController::class, 'create'])->name('task.create');
route::delete('/task/{id}', [TaskController::class, 'destroy'])->name('task.destroy');