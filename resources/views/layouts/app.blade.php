<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>

    <!-- Bootstrap CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="d-flex flex-column min-vh-100">

    <main class="flex-fill container mt-4">
        @include('components.alert')
        @yield('content')
    </main>

    <footer class="mt-auto text-center py-3 border-top bg-light text-muted">
        Developed by <span class="text-success fw-bold">Leena</span> —
        <a href="https://github.com/LinaBaniOudeh" target="_blank" class="text-decoration-none">
            <i class="bi bi-github"></i> GitHub
        </a>
    </footer>

    @stack('scripts')
</body>
</html>
