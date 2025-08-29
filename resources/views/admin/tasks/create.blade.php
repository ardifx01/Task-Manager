@extends('layouts.app')

@section('title', 'Assign Task')

@section('content')
<div class="max-w-3xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Assign Task — {{ $project->name }}</h1>

    <form action="{{ route('admin.tasks.store', $project->id) }}" method="POST" class="bg-white shadow rounded p-6 space-y-4">
        @csrf

        <div>
            <label class="block text-sm font-medium mb-1">Assign to User</label>
            <select name="assigned_to" class="w-full border rounded px-3 py-2" required>
                <option value="" hidden>-- choose user --</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" @selected(old('assigned_to')==$user->id)>{{ $user->name }} — {{ $user->email }}</option>
                @endforeach
            </select>
            @error('assigned_to')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Title</label>
            <input type="text" name="title" value="{{ old('title') }}" class="w-full border rounded px-3 py-2" required>
            @error('title')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Description</label>
            <textarea name="description" rows="4" class="w-full border rounded px-3 py-2">{{ old('description') }}</textarea>
            @error('description')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        <div class="flex items-center gap-3">
            <a href="{{ route('admin.projects.show', $project->id) }}" class="px-4 py-2 rounded border">Cancel</a>
            <button type="submit" class="px-4 py-2 rounded bg-blue-600 text-white">Save Task</button>
        </div>
    </form>
</div>
@endsection
