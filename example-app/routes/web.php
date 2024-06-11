<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\viewdashboard;
use App\Http\Controllers\register_form;
use App\Http\Controllers\register_user;
Route::get('/', function () {
    return view('LRpage');
});

route::get('/view_form', [register_form::class, 'viewform']);
route::post('/login', [viewdashboard::class, 'viewdash']);
route::post('register_user', [register_user::class, 'registerUser']);