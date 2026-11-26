<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ToDo App')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f4f6fb;
            font-family: Arial, sans-serif;
        }

        .navbar {
            background: #172554;
        }

        .navbar-brand {
            color: white;
            font-weight: bold;
        }

        .main-container {
            max-width: 900px;
            margin: 40px auto;
        }

        .todo-card {
            border: none;
            border-radius: 14px;
            box-shadow: 0 4px 18px rgba(0,0,0,.06);
        }

        .completed {
            text-decoration: line-through;
            color: #888;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('todos.index') }}">
            My ToDo App
        </a>
    </div>
</nav>

<main class="container main-container">
    @yield('content')
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
