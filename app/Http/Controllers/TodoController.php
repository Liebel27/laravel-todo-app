<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    // Menampilkan daftar ToDo
    public function index()
    {
        $todos = Todo::latest()->get();

        return view('todos.index', compact('todos'));
    }

    // Menampilkan halaman tambah ToDo
    public function create()
    {
        return view('todos.create');
    }

    // Menyimpan ToDo baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Todo::create($validated);

        return redirect()->route('todos.index')
            ->with('success', 'ToDo berhasil ditambahkan!');
    }

    // Mengubah status ToDo
    public function toggle(Todo $todo)
    {
        $todo->is_completed = !$todo->is_completed;
        $todo->completed_at = $todo->is_completed ? now() : null;
        $todo->save();

        return redirect()->route('todos.index');
    }

    // Menghapus ToDo
    public function destroy(Todo $todo)
    {
        $todo->delete();

        return redirect()->route('todos.index')
            ->with('success', 'ToDo berhasil dihapus!');
    }
}