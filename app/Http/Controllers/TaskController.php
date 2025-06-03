<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Response;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use Symfony\Component\HttpFoundation\StreamedResponse;

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

   public function export()
{
    $tasks = Task::select('title', 'description', 'due_date', 'is_completed')->get();

    $csvData = [];

    // Header row
    $csvData[] = ['Title', 'Description', 'Due Date', 'Status'];

    // Task rows
    foreach ($tasks as $task) {
        $csvData[] = [
            $task->title,
            $task->description,
            $task->due_date,
            $task->is_completed ? 'Completed' : 'Pending'
        ];
    }

    // Convert to CSV string
    $csvString = '';
    foreach ($csvData as $row) {
        $csvString .= implode(',', array_map(fn($v) => '"' . str_replace('"', '""', $v) . '"', $row)) . "\n";
    }

    // Return download response
    return Response::make($csvString, 200, [
        'Content-Type' => 'text/csv',
        'Content-Disposition' => 'attachment; filename="tasks.csv"',
    ]);
}
}
