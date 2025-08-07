@extends('layouts.app')

@section('title', 'Edit Tugas')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Edit Tugas</h1>

    <form action="{{ route('admin.tasks.update', $task->id) }}" method="POST" class="bg-white p-6 rounded shadow">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="user_id" class="block font-medium">Pilih User</label>
            <select name="user_id" id="user_id" required class="w-full border rounded px-3 py-2">
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ $task->user_id == $user->id ? 'selected' : '' }}>
                        {{ $user->name }} ({{ $user->email }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="title" class="block font-medium">Judul Tugas</label>
            <input type="text" name="title" id="title" value="{{ $task->title }}" required class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label for="description" class="block font-medium">Deskripsi Tugas</label>
            <textarea name="description" id="description" rows="4" required class="w-full border rounded px-3 py-2">{{ $task->description }}</textarea>
        </div>

        <div class="mb-4">
            <label for="status" class="block font-medium">Status</label>
            <select name="status" id="status" required class="w-full border rounded px-3 py-2">
                <option value="belum dikerjakan" {{ $task->status == 'belum dikerjakan' ? 'selected' : '' }}>Belum Dikerjakan</option>
                <option value="proses" {{ $task->status == 'proses' ? 'selected' : '' }}>Proses</option>
                <option value="selesai" {{ $task->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Update
        </button>
        <a href="{{ route('admin.tasks.index') }}" class="ml-4 text-gray-600 hover:underline">Kembali</a>
    </form>
@endsection
