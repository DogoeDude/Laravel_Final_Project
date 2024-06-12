<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function create(){
        $task = Task::create(
            [
            'content' => request() -> get('task', null),
            ]
        );
        return redirect()->route('dashboard');
        
    }
}
