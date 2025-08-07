@extends('layouts.app')

@section('title', 'Manage Task User')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Daftar Tugas</h1>

    <a href="{{ route('admin.tasks.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Tambah Tugas</a>

    <table class="w-full bg-white shadow rounded">
        <thead>
            <tr>
                <th class="p-2 border">Username</th>
                <th class="p-2 border">Judul</th>
                <th class="p-2 border">Status</th>
                <th class="p-2 border">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
                <tr>
                    <td class="border p-2">{{ $task->user->name }}</td>
                    <td class="border p-2">{{ $task->title }}</td>
                    <td class="border p-2">{{ $task->status }}</td>
                    <td class="border p-2">
                        <a href="{{ route('admin.tasks.edit', $task->id) }}" class="text-blue-500">Edit</a> |
                        <form action="{{ route('admin.tasks.destroy', $task->id) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-500" onclick="return confirm('Yakin?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
