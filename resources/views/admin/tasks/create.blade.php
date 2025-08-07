@extends('layouts.app')

@section('title', 'Tambah Tugas')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Tambah Tugas untuk User</h1>

    <form action="{{ route('admin.tasks.store') }}" method="POST" class="bg-white p-6 rounded shadow">
        @csrf

        <div class="mb-4">
            <label for="user_id" class="block font-medium">Pilih User</label>
            <select name="user_id" id="user_id" required class="w-full border rounded px-3 py-2">
                <option value="">-- Pilih User --</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="title" class="block font-medium">Judul Tugas</label>
            <input type="text" name="title" id="title" required class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label for="description" class="block font-medium">Deskripsi Tugas</label>
            <textarea name="description" id="description" rows="4" required class="w-full border rounded px-3 py-2"></textarea>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Simpan
        </button>
        <a href="{{ route('admin.tasks.index') }}" class="ml-4 text-gray-600 hover:underline">Kembali</a>
    </form>
@endsection
