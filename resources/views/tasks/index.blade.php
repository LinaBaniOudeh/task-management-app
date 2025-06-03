@extends('layouts.app')

@section('content')
{{-- Add Bootstrap Icons --}}
@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
@endpush

<div class="container">
    {{-- Header with Buttons --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">Task List</h1>
        <div class="btn-group">
            <a href="{{ route('tasks.export') }}" class="btn btn-outline-secondary">
                <i class="bi bi-download"></i> Export
            </a>
            <a href="{{ route('tasks.create') }}" class="btn btn-success">
                <i class="bi bi-plus-lg"></i> Create Task
            </a>
        </div>
    </div>

    {{-- Filter Buttons --}}
    <x-task-filter />

    {{-- Task Table --}}
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
                            <a href="{{ route('tasks.edit', $task) }}" class="btn btn-primary btn-sm">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this task?')">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Pagination --}}
        {{ $tasks->links() }}
    @else
        <p>No tasks available.</p>
    @endif
</div>
@endsection
