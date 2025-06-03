@extends('layouts.app')

@section('content')
<div class="container">
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

    {{-- Filter and Sort Form --}}
    <form id="filterForm" method="GET">
        <div class="row g-2 mb-3 align-items-center">
            <div class="col-md-4">
                <input type="text" name="search" id="search" value="{{ request('search') }}" class="form-control" placeholder="Search tasks...">
            </div>
            <div class="col-md-2">
                <select name="filter" id="filter" class="form-select">
                    <option value="">All</option>
                    <option value="completed" {{ request('filter') == 'completed' ? 'selected' : '' }}>Completed</option>
                    <option value="pending" {{ request('filter') == 'pending' ? 'selected' : '' }}>Pending</option>
                </select>
            </div>
            <div class="col-md-2">
                <select name="sort_by" id="sort_by" class="form-select">
                    <option value="">Sort By</option>
                    <option value="title" {{ request('sort_by') == 'title' ? 'selected' : '' }}>Title</option>
                    <option value="due_date" {{ request('sort_by') == 'due_date' ? 'selected' : '' }}>Due Date</option>
                    <option value="created_at" {{ request('sort_by') == 'created_at' ? 'selected' : '' }}>Created</option>
                </select>
            </div>
            <div class="col-md-2">
                <select name="sort_direction" id="sort_direction" class="form-select">
                    <option value="asc" {{ request('sort_direction') == 'asc' ? 'selected' : '' }}>Ascending</option>
                    <option value="desc" {{ request('sort_direction') == 'desc' ? 'selected' : '' }}>Descending</option>
                </select>
            </div>
            <div class="col-md-2">
                <button type="reset" class="btn btn-outline-secondary w-100" onclick="window.location='{{ route('tasks.index') }}'">Reset</button>
            </div>
        </div>
    </form>

    {{-- Task Table --}}
    <div id="taskTableWrapper">
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
            {{ $tasks->appends(request()->query())->links() }}
        @else
            <div class="alert alert-info">No tasks available.</div>
        @endif
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function () {
    let delay;
    $('#search').on('input', function () {
        clearTimeout(delay);
        delay = setTimeout(fetchTasks, 400);
    });

    $('#sort_by, #sort_direction, #filter').on('change', function () {
        fetchTasks();
    });

    function fetchTasks() {
        $.ajax({
            url: '{{ route('tasks.index') }}',
            type: 'GET',
            data: $('#filterForm').serialize(),
            success: function (response) {
                const html = $(response).find('#taskTableWrapper').html();
                $('#taskTableWrapper').html(html);
            },
            error: function () {
                alert('Failed to fetch updated tasks.');
            }
        });
    }
});
</script>
@endpush
