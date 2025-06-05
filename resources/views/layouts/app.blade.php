<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>

    <!-- Bootstrap CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    {{-- <link href="{{ asset('css/styles.css') }}" rel="stylesheet"> --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="d-flex flex-column min-vh-100 bg-light">

    <!-- 🔷 Header Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('tasks.index') }}">
                <i class="bi bi-list-task"></i> TaskManager
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            {{-- <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tasks.create') }}">
                            <i class="bi bi-plus-circle"></i> Create Task
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tasks.export') }}">
                            <i class="bi bi-download"></i> Export
                        </a>
                    </li>
                </ul>
            </div> --}}
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-fill container py-4">
        @include('components.alert')
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="mt-auto text-center py-3 border-top bg-white text-muted small">
        Developed by <span class="text-success fw-bold">Leena</span> —
        <a href="https://github.com/LinaBaniOudeh" target="_blank" class="text-decoration-none">
            <i class="bi bi-github"></i> GitHub
        </a>
    </footer>

    @stack('scripts')
</body>

</html>
