<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class register_form extends Controller
{
    public function viewform(){
        
        return view('registerform');
    }
}
