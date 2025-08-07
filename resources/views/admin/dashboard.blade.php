@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Selamat Datang, Admin!</h1>

    <div class="grid grid-cols-2 gap-6">
        <div class="bg-white p-6 rounded shadow hover:shadow-lg transition">
            <h2 class="text-xl font-semibold mb-2">Manage Task User</h2>
            <p>Atur dan kelola tugas untuk user</p>
        </div>

        <div class="bg-white p-6 rounded shadow hover:shadow-lg transition">
            <h2 class="text-xl font-semibold mb-2">Manage User</h2>
            <p>Tambah, edit, dan hapus user</p>
        </div>
    </div>
@endsection
