@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Task List</h1>
        <a href="{{ route('tasks.create') }}" class="btn btn-success">+ Create Task</a>
    </div>

    <x-task-filter />

    @if($tasks->count())
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Due Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                    <tr class="{{ $task->is_completed ? 'table-success' : '' }}">
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->description }}</td>
                        <td>{{ \Carbon\Carbon::parse($task->due_date)->format('Y-m-d H:i') }}</td>
                        <td>
                            <span class="badge bg-{{ $task->is_completed ? 'success' : 'warning' }}">
                                {{ $task->is_completed ? 'Completed' : 'Pending' }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('tasks.edit', $task) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this task?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $tasks->links() }}
    @else
        <p>No tasks available.</p>
    @endif
</div>
@endsection