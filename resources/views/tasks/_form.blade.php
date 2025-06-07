<div class="row justify-content-center">
    <div class="col-md-8">
        <a href="{{ route('tasks.index') }}" class="btn btn-outline-secondary mb-3">
            <i class="bi bi-arrow-left"></i> Back to Task List
        </a>

        <div class="card shadow-sm">
            <div class="card-header bg-success text-white">
                {{ isset($task) ? 'Edit Task' : 'Create New Task' }}
            </div>

            <div class="card-body">
                <form method="POST" action="{{ isset($task) ? route('tasks.update', $task) : route('tasks.store') }}">
                    @csrf
                    @if (isset($task))
                        @method('PUT')
                    @endif

                    <div class="mb-3">
                        <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                        <input type="text" id="title" name="title"
                            class="form-control @error('title') is-invalid @enderror"
                            value="{{ old('title', $task->title ?? '') }}" placeholder="Enter task title">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea id="description" name="description" class="form-control" placeholder="Enter task description">{{ old('description', $task->description ?? '') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="due_date" class="form-label">Due Date <span class="text-danger">*</span></label>
                        @php
                            $dueDateFormatted = isset($task->due_date)
                                ? \Carbon\Carbon::parse($task->due_date)->format('Y-m-d\TH:i')
                                : '';
                        @endphp
                        <input type="datetime-local" id="due_date" name="due_date"
                            class="form-control @error('due_date') is-invalid @enderror"
                            value="{{ old('due_date', $dueDateFormatted) }}" min="{{ now()->format('Y-m-d\TH:i') }}">
                        @error('due_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                    </div>

                    <div class="form-check mb-3">
                        <input type="hidden" name="is_completed" value="0">
                        <input class="form-check-input" type="checkbox" name="is_completed" id="is_completed"
                            value="1" {{ old('is_completed', $task->is_completed ?? false) ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_completed">Mark as Completed</label>
                    </div>

                    <button type="submit" class="btn btn-success w-100">
                        <i class="bi {{ isset($task) ? 'bi-pencil-square' : 'bi-plus-circle' }}"></i>
                        {{ isset($task) ? 'Update Task' : 'Create Task' }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
