@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Edit User</h1>

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="bg-white p-6 rounded shadow">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block font-medium">Username</label>
            <input type="text" name="name" id="name" value="{{ $user->name }}" required class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label for="email" class="block font-medium">Email</label>
            <input type="email" name="email" id="email" value="{{ $user->email }}" required class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label for="password" class="block font-medium">Password (kosongkan jika tidak diubah)</label>
            <input type="password" name="password" id="password" class="w-full border rounded px-3 py-2">
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
        <a href="{{ route('admin.users.index') }}" class="ml-4 text-gray-600 hover:underline">Kembali</a>
    </form>
@endsection
