@extends('layouts.app')

@section('title', 'Tugas Saya')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Tugas Saya</h1>

    @foreach($tasks as $task)
        <div class="bg-white p-4 rounded shadow mb-4">
            <h2 class="text-lg font-semibold">{{ $task->title }}</h2>
            <p class="text-sm text-gray-700 mb-2">{{ $task->description }}</p>

            @if($task->project->status === 'completed')
            <span class="text-green-600 font-semibold">Completed</span>
            @else
                <form action="{{ route('user.tasks.updateStatus', $task->id) }}" method="POST" class="flex items-center gap-2">
                    @csrf
                    <select name="status" onchange="this.form.submit()" class="border rounded px-2 py-1 text-sm">
                        <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="in_progress" {{ $task->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                        <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Completed</option>
                    </select>
                    <span class="text-gray-500 text-sm">Current status: {{ ucfirst(str_replace('_', ' ', $task->status)) }}</span>
                </form>
            @endif
        </div>
    @endforeach

    @if(session('success'))
        <div class="mt-4 text-green-600 font-semibold">
            {{ session('success') }}
        </div>
    @endif
@endsection
