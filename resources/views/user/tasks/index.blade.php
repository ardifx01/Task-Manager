@extends('layouts.app')

@section('title', 'Tugas Saya')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Tugas Saya</h1>

    @foreach($tasks as $task)
        <div class="bg-white p-4 rounded shadow mb-4">
            <h2 class="text-lg font-semibold">{{ $task->title }}</h2>
            <p class="text-sm text-gray-700 mb-2">{{ $task->description }}</p>

            <form action="{{ route('user.tasks.updateStatus', $task->id) }}" method="POST" class="flex items-center gap-2">
                @csrf
                <select name="status" onchange="this.form.submit()" class="border rounded px-2 py-1 text-sm">
                    <option value="belum dikerjakan" {{ $task->status == 'belum dikerjakan' ? 'selected' : '' }}>Belum Dikerjakan</option>
                    <option value="proses" {{ $task->status == 'proses' ? 'selected' : '' }}>Proses</option>
                    <option value="selesai" {{ $task->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                </select>
                <span class="text-gray-500 text-sm">Status saat ini</span>
            </form>
        </div>
    @endforeach

    @if(session('success'))
        <div class="mt-4 text-green-600 font-semibold">
            {{ session('success') }}
        </div>
    @endif
@endsection
