<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
class AddItem extends Controller
{
    public function add_the_activity(Request $request){
        $incomingActivity = $request->validate([
            'title'=>['required', 'min: 5'],
            'description'=>'nullable'
        ]);
        Todo::create($incomingActivity);
        $request->session()->flash('status', 'Added Successfully!');
        return redirect('/');
    }
    
}
