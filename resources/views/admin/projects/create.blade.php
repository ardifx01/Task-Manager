@extends('layouts.app')

@section('title', 'Create Project')

@section('content')
<div class="max-w-3xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Create Project</h1>

    @includeWhen(session('success') || session('error'), 'user._message')

    <form action="{{ route('admin.projects.store') }}" method="POST" class="bg-white shadow rounded p-6 space-y-4">
        @csrf
        <div>
            <label class="block text-sm font-medium mb-1">Project Name</label>
            <input type="text" name="name" value="{{ old('name') }}"
                   class="w-full border rounded px-3 py-2 focus:outline-none focus:ring"
                   placeholder="e.g. Website Revamp" required>
            @error('name')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        <div>
            <label class="block text-sm font-medium mb-1">Description</label>
            <textarea name="description" rows="4"
                      class="w-full border rounded px-3 py-2 focus:outline-none focus:ring"
                      placeholder="Optional">{{ old('description') }}</textarea>
            @error('description')<p class="text-red-600 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        <div class="flex items-center gap-3">
            <a href="{{ route('admin.projects.index') }}" class="px-4 py-2 rounded border">Cancel</a>
            <button type="submit" class="px-4 py-2 rounded bg-blue-600 text-white">Create</button>
        </div>
    </form>
</div>
@endsection
