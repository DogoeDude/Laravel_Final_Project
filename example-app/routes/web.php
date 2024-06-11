<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\register_form;
use App\Http\Controllers\MyAuthController;

Route::get('/', function () {
    return view('LRpage');
})->name('LRpage');

Route::get('/dashboard', function(){
    return view('dashboard');
})->name('dashboard');

route::get('/view_form', [register_form::class, 'viewform'])->name('view_form');
route::post('/register_user', [MyAuthController::class, 'registerUser']);
Route::post('/login', [MyAuthController::class, 'checkCredentials'])->name('login');
route::get('/logout', [MyAuthController::class, 'loggingout']);
route::get('profile', [MyAuthController::class, 'profile']);
