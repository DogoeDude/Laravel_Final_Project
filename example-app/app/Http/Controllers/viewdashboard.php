<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class viewdashboard extends Controller
{
    public function viewdash(){
        return view('dashboard');
    }
}
