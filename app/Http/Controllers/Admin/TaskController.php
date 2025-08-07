<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::with('user')->get(); // Ambil semua tugas dan nama user
        return view('admin.tasks.index', compact('tasks'));
    }

    public function create()
    {
        $users = User::where('is_role', 'user')->get(); // Pilih user saja
        return view('admin.tasks.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'title' => 'required|string',
            'description' => 'required|string',
        ]);

        Task::create($request->all());
        return redirect()->route('admin.tasks.index')->with('success', 'Tugas berhasil ditambahkan.');
    }

    public function edit(Task $task)
    {
        $users = User::where('is_role', 'user')->get();
        return view('admin.tasks.edit', compact('task', 'users'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'title' => 'required|string',
            'description' => 'required|string',
            'status' => 'required|string'
        ]);

        $task->update($request->all());
        return redirect()->route('admin.tasks.index')->with('success', 'Tugas berhasil diperbarui.');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('admin.tasks.index')->with('success', 'Tugas berhasil dihapus.');
    }
}
