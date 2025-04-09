<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Task Management App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    {{-- Bootstrap 5 CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <style>
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            height: 100vh;
            background-color: #0F284B;
            color: white;
            position: fixed;
            width: 220px;
            padding-top: 20px;
        }
        .sidebar a {
            color: white;
            padding: 12px;
            display: block;
            text-decoration: none;
        }
        .sidebar a:hover {
            background-color: #7BB1BA;
            color: black;
        }
        .main {
            margin-left: 220px;
            padding: 20px;
        }
    </style>

    @stack('styles')
</head>
<body>

    {{-- Sidebar --}}
    <div class="sidebar">
        <h4 class="text-center">TaskApp</h4>
        <hr style="border-color: white;">
        @auth
            <a href="{{ route('dashboard') }}"><i class="bi bi-speedometer2"></i> Dashboard</a>
            <a href="{{ route('tasks.index') }}"><i class="bi bi-list-task"></i> Tasks</a>
            <a href="{{ route('timesheets.index') }}"><i class="bi bi-clock-history"></i> Timesheets</a>
            <a href="{{ route('reports') }}"><i class="bi bi-graph-up"></i> Reports</a>

            <form action="{{ route('logout') }}" method="POST" class="mt-3 px-3">
                @csrf
                <button class="btn btn-danger w-100"><i class="bi bi-box-arrow-right"></i> Logout</button>
            </form>
        @endauth
    </div>
   
    {{-- Main Content Area --}}
    <div class="main" id="main">
        @yield('content')
    </div>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
</body>
</html>
