@extends('layouts.app')

@section('title', 'Tambah User')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Tambah User</h1>

    <form action="{{ route('admin.users.store') }}" method="POST" class="bg-white p-6 rounded shadow">
        @csrf
        <div class="mb-4">
            <label for="name" class="block font-medium">Nama</label>
            <input type="text" name="name" id="name" required class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label for="email" class="block font-medium">Email</label>
            <input type="email" name="email" id="email" required class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label for="password" class="block font-medium">Password</label>
            <input type="password" name="password" id="password" required class="w-full border rounded px-3 py-2">
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
        <a href="{{ route('admin.users.index') }}" class="ml-4 text-gray-600 hover:underline">Kembali</a>
    </form>
@endsection
