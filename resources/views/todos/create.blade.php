<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Tugas | ToDo App</title>

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
        }

        .brand {
            font-size: 22px;
            font-weight: bold;
        }

        .brand span {
            color: #70a1ff;
        }

        .container {
            max-width: 700px;
            margin: 55px auto;
            padding: 0 20px;
        }

        .form-card {
            background: white;
            padding: 35px;
            border-radius: 16px;
            box-shadow: 0 5px 25px rgba(20, 33, 61, .06);
        }

        .form-header {
            margin-bottom: 28px;
        }

        .form-header h1 {
            font-size: 27px;
            margin-bottom: 10px;
        }

        .form-header p {
            color: #78849a;
            line-height: 1.6;
        }

        .form-group {
            margin-bottom: 22px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 10px;
            font-size: 14px;
        }

        input,
        textarea {
            width: 100%;
            padding: 14px;
            border: 1px solid #dce2ec;
            border-radius: 9px;
            font-family: inherit;
            font-size: 14px;
            outline: none;
            transition: .2s;
        }

        input:focus,
        textarea:focus {
            border-color: #3563e9;
            box-shadow: 0 0 0 3px rgba(53, 99, 233, .1);
        }

        textarea {
            min-height: 140px;
            resize: vertical;
        }

        .error {
            color: #d93636;
            font-size: 13px;
            margin-top: 8px;
        }

        .form-actions {
            display: flex;
            gap: 12px;
            margin-top: 30px;
        }

        button,
        .back-button {
            padding: 13px 20px;
            border-radius: 9px;
            border: none;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            text-align: center;
        }

        button {
            background: #3563e9;
            color: white;
        }

        button:hover {
            background: #244dc4;
        }

        .back-button {
            background: #edf0f5;
            color: #14213d;
        }

        .back-button:hover {
            background: #dfe5ef;
        }

        footer {
            text-align: center;
            padding: 25px;
            color: #9aa4b5;
            font-size: 13px;
        }

        @media(max-width: 600px) {
            .container {
                margin: 30px auto;
            }

            .form-card {
                padding: 23px;
            }

            .form-header h1 {
                font-size: 23px;
            }

            .form-actions {
                flex-direction: column;
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
        <div class="brand">ToDo<span>App.</span></div>
    </nav>

    <main class="container">

        <div class="form-card">

            <div class="form-header">
                <h1>Tambah Tugas Baru</h1>
                <p>
                    Catat aktivitas yang ingin kamu selesaikan.
                    Kelola waktumu dan tetap produktif!
                </p>
            </div>

            <form action="{{ route('todos.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="title">Judul Tugas</label>

                    <input type="text" id="title" name="title" value="{{ old('title') }}"
                        placeholder="Contoh: Mengerjakan tugas Laravel" required>

                    @error('title')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">Keterangan Tugas</label>

                    <textarea id="description" name="description" placeholder="Tuliskan detail aktivitas yang akan dikerjakan...">{{ old('description') }}</textarea>

                    @error('description')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-actions">
                    <button type="submit">
                        Simpan Tugas
                    </button>

                    <a href="{{ route('todos.index') }}" class="back-button">
                        Kembali ke Dashboard
                    </a>
                </div>

            </form>

        </div>

    </main>

    <footer>
        ToDo App &copy; {{ date('Y') }} — Manage Your Time, Achieve Your Goals.
    </footer>

</body>

</html>
