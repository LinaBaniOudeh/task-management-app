<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $query = Task::query();
        if ($request->filter === 'completed') {
            $query->where('is_completed', true);
        } elseif ($request->filter === 'pending') {
            $query->where('is_completed', false);
        }
        if ($request->search) {
            $query->where('title', 'like', "%{$request->search}%");
        }
        $tasks = $query->orderBy('due_date')->paginate(10);
        return view('tasks.index', compact('tasks'));
    }

    public function create() { return view('tasks.create'); }


    public function store(StoreTaskRequest $request)
    {
        Task::create($request->validated());
        return redirect()->route('tasks.index')->with('success', 'Task created successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function edit(Task $task) { return view('tasks.edit', compact('task')); }



    public function update(UpdateTaskRequest $request, Task $task)
    {
        $task->update($request->validated());
        return redirect()->route('tasks.index')->with('success', 'Task updated');
    }


    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted');
    }
}
