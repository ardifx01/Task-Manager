<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TaskViewController extends Controller
{
    // Menampilkan task milik user yang login
    public function index()
    {
        // Hanya ambil task yang assigned ke user ini
        $tasks = Task::where('assigned_to', Auth::id())->get();

        return view('user.tasks.index', compact('tasks'));
    }

    // Update status task
    public function updateStatus(Request $request, Task $task)
    {
        // Pastikan hanya user yang ditugaskan bisa update
        if ($task->assigned_to !== Auth::id()) {
            return back()->with('error', 'Anda tidak berhak mengubah status tugas ini.');
        }

        $request->validate([
            'status' => 'required|in:pending,in_progress,completed'
        ]);

        $task->status = $request->status;
        $task->save();

        return back()->with('success', 'Status tugas berhasil diperbarui.');
    }

}
