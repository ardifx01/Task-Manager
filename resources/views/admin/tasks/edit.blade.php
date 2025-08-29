@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto p-6 bg-white shadow rounded">
    <h1 class="text-xl font-bold mb-4">Edit Task</h1>

    <form action="{{ route('admin.tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="block mb-1">Title</label>
            <input type="text" name="title" value="{{ old('title', $task->title) }}" class="w-full border px-3 py-2 rounded">
        </div>

        <div class="mb-3">
            <label class="block mb-1">Description</label>
            <textarea name="description" class="w-full border px-3 py-2 rounded">{{ old('description', $task->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label class="block mb-1">Assign to User</label>
            <select name="assigned_to" class="w-full border px-3 py-2 rounded">
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $task->user_id == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
    </form>
</div>
@endsection
