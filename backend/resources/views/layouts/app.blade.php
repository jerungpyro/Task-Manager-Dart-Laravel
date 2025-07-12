<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Task Manager')</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        .priority-high { background-color: #dc3545; color: white; }
        .priority-medium { background-color: #fd7e14; color: white; }
        .priority-low { background-color: #198754; color: white; }
        .task-completed { text-decoration: line-through; opacity: 0.7; }
        .overdue { border-left: 4px solid #dc3545; }
        .due-today { border-left: 4px solid #fd7e14; }
        .navbar-brand { font-weight: bold; }
        .stat-card { border-radius: 10px; }
        .task-card { border-radius: 8px; margin-bottom: 1rem; }
        .task-actions { opacity: 0.7; transition: opacity 0.3s; }
        .task-card:hover .task-actions { opacity: 1; }
        
        /* Fixed footer styles */
        body { 
            background-color: #f8f9fa;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        .main-content {
            flex: 1;
            padding-bottom: 2rem;
        }
        
        .footer {
            margin-top: auto;
            background-color: #0d6efd !important;
            color: white;
            padding: 1rem 0;
        }
    </style>
</head>
<body class="d-flex flex-column h-100">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                <i class="fas fa-tasks me-2"></i>Task Manager
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tasks.index') }}">
                            <i class="fas fa-list me-1"></i>All Tasks
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tasks.create') }}">
                            <i class="fas fa-plus me-1"></i>Add Task
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container main-content mt-4">
        <!-- Flash Messages -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer bg-primary text-white text-center py-3">
        <div class="container">
            <p class="mb-0">&copy; 2025 Task Manager. Created with ❤️ by <strong>Your Name</strong></p>
            <p class="mb-0"><small>Built with Laravel & Bootstrap</small></p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    @stack('scripts')
</body>
</html>
