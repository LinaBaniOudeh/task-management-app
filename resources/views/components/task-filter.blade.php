<form method="GET" class="mb-3">
    <div class="btn-group" role="group">
        <a href="{{ route('tasks.index') }}" class="btn btn-outline-secondary {{ request('filter') === null ? 'active' : '' }}">All</a>
        <a href="{{ route('tasks.index', ['filter' => 'completed']) }}" class="btn btn-outline-secondary {{ request('filter') === 'completed' ? 'active' : '' }}">Completed</a>
        <a href="{{ route('tasks.index', ['filter' => 'pending']) }}" class="btn btn-outline-secondary {{ request('filter') === 'pending' ? 'active' : '' }}">Pending</a>
    </div>
</form>
