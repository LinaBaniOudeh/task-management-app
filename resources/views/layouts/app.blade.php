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
<link rel="icon" href="{{ asset('favicon.png') }}" type="image/x-icon">

<body class="d-flex flex-column min-vh-100 bg-light">
{{-- 
    <!-- 🔷 Header Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('tasks.index') }}">
                <img src="{{ asset('task-management.png') }}" alt="Logo" width="45" height="45" class="me-2">
                 TaskManager
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav> --}}
<!-- 🔷 Header Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold d-flex align-items-center" href="{{ route('tasks.index') }}">
            <img src="{{ asset('task-management.png') }}" alt="Logo" width="40" height="40" class="me-2">
            <span class="fs-4">TaskManager</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
            <span class="navbar-toggler-icon"></span>
        </button>
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
