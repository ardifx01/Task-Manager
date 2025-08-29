<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProjectController extends Controller
{
    public function index(){
        $projects = Project::where('created_by', Auth::id())->get();
        return view('admin.projects.index', compact('projects'));
    }

    public function create(){
        return view('admin.projects.create');
    }

        public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $project->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.projects.index')->with('success', 'Project berhasil diperbarui.');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Project berhasil dihapus.');
    }


    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'description' => 'nullable'
        ]);
        Project::create([
            'name' => $request->name,
            'description' => $request->description,
            'created_by' => Auth::id(),
        ]);

        return redirect()->route('admin.projects.index')->with('success', 'Project created successfully.');
    }

    public function show(Project $project){
        $project->load('tasks.user');
        // Ambil semua user agar bisa pilih siapa yang di-assign
        $users = User::where('is_role', 'user')->get();

        return view('admin.projects.show', compact('project', 'users'));
    }

    public function complete(Project $project) {
        $incompleteTasks = $project->tasks()->where('status', '!=', 'completed')->count() === 0;

        if ($incompleteTasks) {
            $project->status = 'completed';
            $project->save();

            return redirect()->back()->with('success', 'Project successfully marked as completed.');
        }

        return redirect()->back()->with('error', 'All tasks must be completed before marking the peroject as complete.');

    }
}
