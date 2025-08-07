@extends('layouts.app')

@section('title', 'Dashboard User')

@section('content')
    <h1 class="text-3xl font-bold mb-6">Selamat Datang, {{ Auth::user()->name }}!</h1>

    <div class="bg-white p-6 rounded shadow hover:shadow-lg transition">
        <h2 class="text-xl font-semibold mb-2">Lihat Task</h2>
        <p>Daftar tugas yang diberikan oleh admin</p>
    </div>
@endsection
