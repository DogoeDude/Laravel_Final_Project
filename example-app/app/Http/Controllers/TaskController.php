<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function dashboard()
    {
        $pendingTasks = Task::where('finished', 0)
                            ->where(function ($query) {
                                $query->whereNull('due_date')
                                      ->orWhere('due_date', '>=', now());
                            })
                            ->get();
                            
        $overdueTasks = Task::where('due_date', '<', now())
                            ->where('finished', 0)
                            ->get();
                            
        $finishedTasks = Task::where('finished', 1)->get();

        return view('dashboard', compact('pendingTasks', 'finishedTasks', 'overdueTasks'));
    }


    public function create(Request $request)
    {
        $request->validate([
            'task' => 'required',
            'desc' => 'nullable',
            'due_date' => 'nullable|date',
        ]);

        Task::create([
            'content' => $request->input('task'),
            'description' => $request->input('desc'),
            'due_date' => $request->input('due_date'),
        ]);

        return redirect()->route('dashboard')->with('success', 'Task added successfully.');
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect()->back()->with('success', 'Task has been removed.');
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('tasks_edit', compact('task'));
    }
    public function update(Request $request, $id)
{
    $request->validate([
        'task' => 'required',
        'desc' => 'nullable',
        'due_date' => 'nullable|date',
        'finished' => 'boolean',
    ]);

    $task = Task::findOrFail($id);
    $task->update([
        'content' => $request->input('task'),
        'description' => $request->input('desc'),
        'due_date' => $request->input('due_date'),
        'finished' => $request->input('finished', 0),
    ]);

    return redirect()->route('dashboard')->with('success', 'Task updated successfully.');
}


    public function markFinished($id)
    {
        $task = Task::findOrFail($id);
        $task->update(['finished' => 1]);

        return redirect()->back()->with('success', 'Task marked as finished.');
    }

}
