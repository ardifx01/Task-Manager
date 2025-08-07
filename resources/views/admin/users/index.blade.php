@extends('layouts.app')

@section('title', 'Manage User')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Daftar User</h1>

    <div class="flex items-center justify-between mb-4">
        <a href="{{ route('admin.users.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah User</a>

        <form method="GET" action="{{ route('admin.users.index') }}" class="flex gap-2">
            <input type="text" name="search" placeholder="Cari nama/email..."
                   value="{{ request('search') }}"
                   class="border px-3 py-1 rounded">
            <button type="submit" class="bg-gray-600 text-white px-3 py-1 rounded">Cari</button>
        </form>
    </div>

    @if(count($users) > 0)
    <table class="w-full bg-white shadow rounded">
        <thead>
            <tr>
                <th class="p-2 border">Nama</th>
                <th class="p-2 border">Email</th>
                <th class="p-2 border">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td class="border p-2">{{ $user->name }}</td>
                    <td class="border p-2">{{ $user->email }}</td>
                    <td class="border p-2">
                        <a href="{{ route('admin.users.edit', $user->id) }}" class="text-blue-500">Edit</a> |
                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Yakin?')" class="text-red-500">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <p class="text-gray-600">Tidak ada user ditemukan.</p>
    @endif
@endsection
