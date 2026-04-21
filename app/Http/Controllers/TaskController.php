<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::latest()->get();
        return view('tasks.index', compact('tasks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'priority' => 'required'
        ]);

        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'priority' => $request->priority,
            'status' => 'Pending'
        ]);

        return redirect()->route('tasks.index')
            ->with('success', 'Task added successfully!')
            ->with('active', 'view');
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);

        // ✅ Handle Complete button
        if ($request->has('status')) {
            $task->update([
                'status' => $request->status
            ]);

            return redirect()->route('tasks.index')
                ->with('success', 'Task completed!')
                ->with('active', 'view');
        }

        // ✅ Handle Edit form
        $request->validate([
            'title' => 'required',
            'priority' => 'required'
        ]);

        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'priority' => $request->priority
        ]);

        return redirect()->route('tasks.index')
            ->with('success', 'Task updated!')
            ->with('active', 'view');
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('tasks.index')
            ->with('success', 'Task deleted!')
            ->with('active', 'view');
    }
}