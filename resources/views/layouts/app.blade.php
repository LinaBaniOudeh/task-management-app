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
<!-- Toast Container -->
<div class="toast-container position-fixed bottom-0 end-0 p-3 z-3">
    @if (session('success'))
        <div id="successToast" class="toast align-items-center text-white bg-success border-0" role="alert"
            aria-live="assertive" aria-atomic="true" data-bs-delay="5000">
            <div class="d-flex">
                <div class="toast-body">
                    {{ session('success') }}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
    @endif
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toastEl = document.getElementById('successToast');
        if (toastEl) {
            const toast = new bootstrap.Toast(toastEl);
            toast.show();
        }
    });
</script>


<body class="d-flex flex-column min-vh-100 bg-light">
    <!-- 🔷 Header Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold d-flex align-items-center" href="{{ route('tasks.index') }}">
                <img src="{{ asset('task-management.png') }}" alt="Logo" width="40" height="40"
                    class="me-2">
                <span class="fs-4">TaskManager</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-fill container py-4">
        {{-- @include('components.alert') --}}
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
