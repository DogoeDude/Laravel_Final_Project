<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user_login;
use App\Http\Controllers\register_form;
use App\Http\Controllers\register_user;
Route::get('/', function () {
    return view('LRpage');
});

route::get('/view_form', [register_form::class, 'viewform'])->name('view_form');
route::post('/register_user', [register_user::class, 'registerUser']);
Route::post('/login', [user_login::class, 'login'])->name('login');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');