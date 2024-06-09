<?php

use App\Http\Controllers\AddItem;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/add_act1', [AddItem::class, 'add_the_activity']);