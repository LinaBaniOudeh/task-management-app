@extends('layouts.app')

@section('content')
<h1>{{ isset($task) ? 'Edit Task' : 'New Task' }}</h1>

<a href="{{ route('tasks.index') }}" class="btn btn-secondary mb-3">
    <i class="bi bi-arrow-left"></i> Back to Task List
</a>

<form method="POST" action="{{ isset($task) ? route('tasks.update', $task) : route('tasks.store') }}">
    @csrf
    @if (isset($task)) @method('PUT') @endif

    <input type="text" name="title" class="form-control mb-2 @error('title') is-invalid @enderror" placeholder="Title" value="{{ old('title', $task->title ?? '') }}">
    @error('title')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror

    <textarea name="description" class="form-control mb-2" placeholder="Description">{{ old('description', $task->description ?? '') }}</textarea>

    @php
        $dueDateFormatted = isset($task->due_date) ? \Carbon\Carbon::parse($task->due_date)->format('Y-m-d\TH:i') : '';
    @endphp
    <input type="datetime-local" name="due_date" class="form-control mb-2 @error('due_date') is-invalid @enderror" value="{{ old('due_date', $dueDateFormatted) }}">
    @error('due_date')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror

    <div class="form-check mb-2">
        <input type="hidden" name="is_completed" value="0">
        <input type="checkbox" class="form-check-input" name="is_completed" value="1"
            {{ old('is_completed') ? 'checked' : '' }}>
        Completed
    </div>

    <button class="btn btn-success">{{ isset($task) ? 'Update' : 'Create' }}</button>
</form>
@endsection
