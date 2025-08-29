@extends('layouts.app')

@section('title', $project->name)

@section('content')
<div class="max-w-5xl mx-auto p-6 space-y-6">

    <div class="flex items-start justify-between gap-4">

        <div class="w-2/3">
            <h1 class="text-2xl font-bold break-words">{{ $project->name }}</h1>
            <p class="text-gray-600 mt-1 text-sm break-words">
                {{ $project->description ?: 'No description' }}
            </p>
        </div>

        <a href="{{ route('admin.tasks.create', $project->id) }}"
           class="inline-flex items-center px-4 py-2 rounded bg-blue-600 text-white shrink-0">
           + Assign Task
        </a>
    </div>

    @php
        $progress = $project->progress();
    @endphp
    <div class="bg-white shadow rounded p-4">
        <div class="flex items-center justify-between mb-2">
            <h2 class="font-semibold">Progress</h2>
            @if($project->status === 'completed')
            <span class="text-sm font-medium text-green-600">Completed</span>
            @else
                <span class="text-sm font-medium">{{ round($progress) }}%</span>
            @endif
        </div>
        <div class="w-full bg-gray-200 rounded-full h-3">
            <div class="h-3 rounded-full bg-gradient-to-r from-green-400 to-green-600" style="width: {{ $progress }}%"></div>
        </div>
    </div>

    <div class="bg-white shadow rounded overflow-hidden">
        <div class="px-4 py-3 border-b">
            <h3 class="font-semibold">Tasks</h3>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="text-left text-sm font-medium text-gray-600 px-4 py-2">Title</th>
                        <th class="text-left text-sm font-medium text-gray-600 px-4 py-2">Assignee</th>
                        <th class="text-left text-sm font-medium text-gray-600 px-4 py-2">Status</th>
                        <th class="text-left text-sm font-medium text-gray-600 px-4 py-2">Created</th>
                        <th class="text-left text-sm font-medium text-gray-600 px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y">
                    @forelse($project->tasks as $task)
                        <tr>
                            <td class="px-4 py-2 break-words max-w-xs">{{ $task->title }}</td>
                            <td class="px-4 py-2">{{ optional($task->user)->name ?? '-' }}</td>
                            <td class="px-4 py-2">
                                @php
                                    $badge = [
                                        'pending' => 'bg-gray-200 text-gray-800',
                                        'in_progress' => 'bg-yellow-200 text-yellow-800',
                                        'completed' => 'bg-green-200 text-green-800',
                                    ][$task->status] ?? 'bg-gray-200 text-gray-800';
                                @endphp
                                <span class="px-2 py-1 rounded text-xs font-medium {{ $badge }}">
                                    {{ str_replace('_',' ', $task->status) }}
                                </span>
                            </td>
                            <td class="px-4 py-2 text-sm text-gray-600">{{ $task->created_at->format('d M Y') }}</td>
                            <td class="px-4 py-2 text-sm space-x-2">

                                <a href="{{ route('admin.tasks.edit', $task->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">
                                    Edit
                                </a>

                                <form action="{{ route('admin.tasks.destroy', $task->id) }}"
                                      method="POST" class="inline-block"
                                      onsubmit="return confirm('Yakin ingin menghapus task ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="inline-flex items-center px-2 py-1 bg-red-600 text-white rounded text-xs">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-6 text-center text-gray-500">
                                Belum ada task pada project ini.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="flex justify-between items-center mt-6">
        <a href="{{ route('admin.projects.index') }}" class="inline-flex px-4 py-2 rounded border">
            ← Back to Projects
        </a>

    @if($project->tasks->count() > 0 
        && $project->tasks->every(fn($t) => $t->status === 'completed') 
        && $project->status !== 'completed')
        <form action="{{ route('admin.projects.complete', $project->id) }}" method="POST" 
              onsubmit="return confirm('Yakin ingin menyelesaikan project ini?');">
            @csrf
            @method('PUT')
            <button type="submit" class="inline-flex px-4 py-2 bg-green-600 text-white rounded">
                Complete Project
            </button>
        </form>
    @elseif($project->status === 'completed')
        <span class="inline-flex px-4 py-2 bg-green-100 text-green-700 rounded font-medium">
            Project Completed
        </span>
    @endif
    </div>
</div>
@endsection
