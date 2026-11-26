<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ToDo Dashboard</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f4f7fc;
            color: #14213d;
            min-height: 100vh;
        }

        .navbar {
            background: #14213d;
            padding: 20px 7%;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .brand {
            font-size: 22px;
            font-weight: bold;
            letter-spacing: .5px;
        }

        .brand span {
            color: #70a1ff;
        }

        .navbar small {
            color: #c5d1e5;
        }

        .container {
            max-width: 1100px;
            margin: 45px auto;
            padding: 0 20px;
        }

        .welcome {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 30px;
        }

        .welcome h1 {
            font-size: 30px;
            margin-bottom: 9px;
        }

        .welcome p {
            color: #78849a;
            line-height: 1.6;
        }

        .add-button {
            display: inline-block;
            background: #3563e9;
            color: white;
            padding: 14px 20px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: bold;
            transition: .2s;
            white-space: nowrap;
        }

        .add-button:hover {
            background: #244dc4;
            transform: translateY(-2px);
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 35px;
        }

        .stat-card {
            background: white;
            padding: 23px;
            border-radius: 14px;
            box-shadow: 0 5px 20px rgba(20, 33, 61, .05);
        }

        .stat-card p {
            color: #78849a;
            font-size: 14px;
            margin-bottom: 12px;
        }

        .stat-card h2 {
            font-size: 30px;
        }

        .task-section {
            background: white;
            border-radius: 16px;
            padding: 28px;
            box-shadow: 0 5px 20px rgba(20, 33, 61, .05);
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 22px;
        }

        .section-header h2 {
            font-size: 20px;
        }

        .task-count {
            color: #3563e9;
            background: #edf2ff;
            padding: 7px 12px;
            border-radius: 20px;
            font-size: 13px;
        }

        .success {
            background: #e3f8ed;
            color: #187344;
            padding: 14px;
            border-radius: 9px;
            margin-bottom: 20px;
        }

        .todo-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            padding: 19px 0;
            border-bottom: 1px solid #edf0f5;
        }

        .todo-item:last-child {
            border-bottom: none;
        }

        .task-left {
            display: flex;
            align-items: flex-start;
            gap: 14px;
            min-width: 0;
        }

        .toggle-button {
            width: 25px;
            height: 25px;
            border: 1px solid #cbd5e1;
            background: white;
            color: #3563e9;
            border-radius: 7px;
            cursor: pointer;
            flex-shrink: 0;
        }

        .toggle-button.done {
            background: #3563e9;
            color: white;
            border-color: #3563e9;
        }

        .task-content {
            min-width: 0;
        }

        .task-content h3 {
            font-size: 16px;
            margin-bottom: 7px;
            overflow-wrap: anywhere;
        }

        .task-content p {
            color: #78849a;
            font-size: 14px;
            line-height: 1.5;
            overflow-wrap: anywhere;
        }

        .completed {
            text-decoration: line-through;
            color: #9aa4b5;
        }

        .task-date {
            display: block;
            color: #187344;
            font-size: 12px;
            margin-top: 9px;
        }

        .delete-button {
            background: #fff0f0;
            color: #d93636;
            border: none;
            padding: 9px 13px;
            border-radius: 8px;
            cursor: pointer;
            flex-shrink: 0;
        }

        .delete-button:hover {
            background: #ffe0e0;
        }

        .empty {
            text-align: center;
            padding: 45px 15px;
            color: #78849a;
        }

        .empty h3 {
            color: #14213d;
            margin-bottom: 10px;
        }

        footer {
            text-align: center;
            padding: 25px;
            color: #9aa4b5;
            font-size: 13px;
        }

        @media(max-width: 650px) {
            .navbar {
                padding: 18px 20px;
            }

            .container {
                margin: 30px auto;
            }

            .welcome {
                align-items: flex-start;
                flex-direction: column;
            }

            .welcome h1 {
                font-size: 25px;
            }

            .stats {
                grid-template-columns: 1fr;
                gap: 12px;
            }

            .stat-card {
                padding: 18px;
            }

            .stat-card h2 {
                font-size: 25px;
            }

            .task-section {
                padding: 19px;
            }

            .todo-item {
                align-items: flex-start;
            }

            .delete-button {
                font-size: 12px;
                padding: 8px;
            }
        }

        /* Menyembunyikan scrollbar tanpa mematikan scrolling */
        html {
            scrollbar-width: none;
            -ms-overflow-style: none;
        }

        html::-webkit-scrollbar {
            display: none;
        }
    </style>
</head>

<body>

    <nav class="navbar">
        <div class="brand">Mitsuya<span>App</span></div>
        <small>Anton Wisnu Mayanto</small>
    </nav>

    <main class="container">

        <section class="welcome">
            <div>
                <h1>My Dashboard</h1>
                <p>Atur aktivitas dan selesaikan tugasmu hari ini.</p>
            </div>

            <a href="{{ route('todos.create') }}" class="add-button">
                + Tambah Tugas
            </a>
        </section>

        @php
            $total = $todos->count();
            $completed = $todos->where('is_completed', true)->count();
            $pending = $total - $completed;
        @endphp

        <section class="stats">
            <div class="stat-card">
                <p>Total Tugas</p>
                <h2>{{ $total }}</h2>
            </div>

            <div class="stat-card">
                <p>Tugas Selesai</p>
                <h2>{{ $completed }}</h2>
            </div>

            <div class="stat-card">
                <p>Belum Selesai</p>
                <h2>{{ $pending }}</h2>
            </div>
        </section>

        <section class="task-section">

            <div class="section-header">
                <h2>Daftar Aktivitas</h2>
                <span class="task-count">{{ $total }} Tugas</span>
            </div>

            @if (session('success'))
                <div class="success">
                    {{ session('success') }}
                </div>
            @endif

            @forelse($todos as $todo)
                <div class="todo-item">

                    <div class="task-left">

                        <form action="{{ route('todos.toggle', $todo->id) }}" method="POST">
                            @csrf
                            @method('PATCH')

                            <button type="submit" class="toggle-button {{ $todo->is_completed ? 'done' : '' }}">
                                {{ $todo->is_completed ? '✓' : '' }}
                            </button>
                        </form>

                        <div class="task-content">

                            <h3 class="{{ $todo->is_completed ? 'completed' : '' }}">
                                {{ $todo->title }}
                            </h3>

                            <p>{{ $todo->description }}</p>

                            @if ($todo->is_completed)
                                <small class="task-date">
                                    Selesai:
                                    {{ $todo->completed_at?->format('d-m-Y H:i') }}
                                </small>
                            @endif

                        </div>
                    </div>

                    <form action="{{ route('todos.destroy', $todo->id) }}" method="POST"
                        onsubmit="return confirm('Yakin ingin menghapus tugas ini?')">

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="delete-button">
                            Hapus
                        </button>
                    </form>

                </div>

            @empty

                <div class="empty">
                    <h3>Belum Ada Tugas</h3>
                    <p>Mulai produktif hari ini dengan menambahkan tugas pertamamu.</p>
                </div>
            @endforelse

        </section>

    </main>

    <footer>
        ToDo App &copy; {{ date('Y') }} — Manage Your Time, Achieve Your Goals.
    </footer>

</body>

</html>
