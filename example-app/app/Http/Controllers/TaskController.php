<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function create(){
        $request->validate([
            'task' => 'required',
            'desc' => 'nullable',
            'img' => 'nullable|image|max:2048', // Validate image upload (optional, max 2MB)
        ]);

        // Handle image upload
        $imgPath = null;
        if ($request->hasFile('img')) {
            $imgPath = $request->file('img')->store('task_images', 'public'); // Store image in public/task_images folder
        }

        // Create the task
        $task = Task::create([
            'content' => $request->input('task'),
            'description' => $request->input('desc'),
            'img' => $imgPath, // Save image path to 'img' field
        ]);

        return redirect()->route('dashboard')->with('success', 'Task added successfully.');
    }

    public function destroy($id){
        $task = Task::findorFail($id);
        $task->delete();
        return redirect()->back()->with('success', 'Task has been removed.');
    }
}
