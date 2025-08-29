@extends('layouts.app')

@section('title', 'Projects')

@section('content')
<div class="max-w-6xl mx-auto p-6">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Projects</h1>
        <a href="{{ route('admin.projects.create') }}" 
           class="bg-blue-500 text-white px-4 py-2 rounded">+ New Project</a>
    </div>

    <div class="bg-white shadow rounded overflow-x-auto">
        <table class="w-full table-auto border-collapse">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="px-4 py-2 w-1/6">Name</th>
                    <th class="px-4 py-2 w-2/6">Description</th>
                    <th class="px-4 py-2 w-1/6">Progress</th>
                    <th class="px-4 py-2 w-1/6">Created At</th>
                    <th class="px-4 py-2 w-1/6">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($projects as $project)
                <tr class="border-t">
                    <td class="px-4 py-2 font-semibold">{{ $project->name }}</td>
                    <td class="px-4 py-2 text-sm text-gray-700 whitespace-normal">
                        {{ $project->description }}
                    </td>
                    <td class="px-4 py-2">
                        @php
                            $totalTasks = $project->tasks->count();
                            $completedTasks = $project->tasks->where('status', 'completed')->count();
                            $progress = $totalTasks > 0 ? round(($completedTasks / $totalTasks) * 100) : 0;
                        @endphp
                        @if ($project->status === 'completed')
                            <span class="inline-flex px-4 py-2 bg-green-100 text-green-700 rounded font-medium">
                                Completed
                            </span>
                        @else
                        <div class="w-full bg-gray-200 rounded-full h-3">
                            <div class="h-3 rounded-full 
                                        bg-gradient-to-r from-green-400 to-green-600" 
                                 style="width: {{ $progress }}%">
                            </div>
                        </div>
                        <span class="text-xs text-gray-600">{{ ($progress) }}%</span>
                        @endif
                    </td>
                    <td class="px-4 py-2 text-sm text-gray-600">
                        {{ $project->created_at->format('d M Y') }}
                    </td>
                    <td class="px-4 py-2">
                        <div class="flex flex-wrap gap-2">
                            <a href="{{ route('admin.projects.show', $project->id) }}" 
                               class="bg-blue-500 text-white px-3 py-1 rounded text-sm">
                                View
                            </a>

                            <a href="{{ route('admin.projects.edit', $project->id) }}" 
                               class="bg-yellow-500 text-white px-3 py-1 rounded text-sm">
                                Edit
                            </a>

                            <form action="{{ route('admin.projects.destroy', $project->id) }}" 
                                  method="POST" 
                                  onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="bg-red-500 text-white px-3 py-1 rounded text-sm">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
