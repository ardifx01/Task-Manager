<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function create(Project $project){
        $users = User::where('is_role', 'user')->get();
        return view('admin.tasks.create', compact('project', 'users'));
    }

    public function store(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'assigned_to' => 'required|exists:users,id', // validasi user
        ]);

        $task = new Task();
        $task->title = $request->title;
        $task->description = $request->description;
        $task->status = 'pending'; // default
        $task->assigned_to = $request->assigned_to;
        $task->project_id = $project->id;
        $task->save();


        return redirect()->route('admin.projects.show', $project->id)->with('success', 'Task berhasil ditambahkan');
    }

    public function updateStatus(Request $request, $id)
    {
        $task = Task::where('id', $id)
            ->where('assigned_to', Auth::id()) // pastikan task milik user login
            ->firstOrFail();

        $request->validate([
            'status' => 'required|in:pending, in_progress, completed',
        ]);

        $task->status = $request->status;
        $task->save();

        return redirect()->back()->with('success', 'Status tugas berhasil diperbarui!');
    }

    public function edit(Task $task) {
        $users = User::where('is_role', 'user')->get();
        return view('admin.tasks.edit', compact('task', 'users'));
    }

    public function update(Request $request, Task $task) {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'assigned_to' => 'required|exists:users,id'
        ]);

        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'assigned_to' => $request->assigned_to
        ]);
        return redirect()->route('admin.projects.show', $task->project_id)->with('success', 'Task Updated Successfully.');
    }

    public function destroy(Task $task) {
        $task->delete();
        
        return redirect()->back()->with('success', "Task Deleted Successfully.");
    }

}
