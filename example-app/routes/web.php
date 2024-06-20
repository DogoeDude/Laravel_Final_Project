<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\register_form;
use App\Http\Controllers\MyAuthController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('LRpage');
})->name('LRpage');

Route::get('/dashboard', [TaskController::class, 'dashboard'])->name('dashboard');
Route::get('/view_form', [register_form::class, 'viewform'])->name('view_form');
Route::post('/register_user', [MyAuthController::class, 'registerUser']);
Route::post('/login', [MyAuthController::class, 'checkCredentials'])->name('login');
Route::get('/logout', [MyAuthController::class, 'loggingout']);
Route::get('profile', [MyAuthController::class, 'profile']);

Route::post('/task', [TaskController::class, 'create'])->name('task.create');
Route::delete('/task/{id}', [TaskController::class, 'destroy'])->name('task.destroy');
Route::get('/task/{id}/edit', [TaskController::class, 'edit'])->name('task.edit');
Route::put('/task/{id}', [TaskController::class, 'update'])->name('task.update');
Route::put('/task/{id}/mark-finished', [TaskController::class, 'markFinished'])->name('task.markFinished');



