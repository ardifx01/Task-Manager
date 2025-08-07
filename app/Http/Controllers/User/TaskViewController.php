<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TaskViewController extends Controller
{
    public function index()
    {
        // Ambil semua tugas milik user yang sedang login
        $tasks = Task::where('user_id', Auth::id())->get();

        return view('user.tasks.index', compact('tasks'));
    }

    public function create()
    {
        $users = User::where('is_role', 'user')->get();
        return view('admin.tasks.create', compact('users'));
    }

    public function edit()
    {
        $users = User::where('is_role', 'user')->get();
        return view('admin.tasks.edit', compact('task', 'users'));

    }

    public function updateStatus(Request $request, Task $task)
    {
        // Pastikan tugas milik user yang sedang login
        if ($task->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'status' => 'required|in:belum dikerjakan,proses,selesai'
        ]);

        $task->status = $request->status;
        $task->save();

        return redirect()->back()->with('success', 'Status tugas berhasil diperbarui.');
    }
}


