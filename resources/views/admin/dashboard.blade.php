@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="space-y-6">
        {{-- Title --}}
        <h1 class="text-3xl font-bold text-gray-800">
            Welcome, <span class="text-indigo-600">Admin</span> 🚀
        </h1>
        <p class="text-gray-600">Manage the application through the quick menu below:</p>

        {{-- Grid Menu --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Manage Task User --}}
            <div
                class="bg-gradient-to-r from-indigo-50 to-white p-6 rounded-2xl border border-gray-200 shadow-sm hover:shadow-md transition group">
                <div class="flex items-center gap-4">
                    <div
                        class="w-12 h-12 flex items-center justify-center rounded-xl bg-indigo-600 text-white text-2xl group-hover:scale-105 transition">
                        📋
                    </div>
                    <div>
                        <h2 class="text-lg font-semibold text-gray-800">Manage User Tasks</h2>
                        <p class="text-gray-600 text-sm">Assign and manage tasks for users</p>
                    </div>
                </div>
                <div class="mt-4">
                    <a href="{{ route('admin.projects.index') }}" class="inline-block px-4 py-2 rounded-xl bg-indigo-600 text-white text-sm font-medium hover:bg-indigo-700 transition">
                        Manage Projects & Tasks
                    </a>
                </div>
            </div>

            {{-- Manage User --}}
            <div
                class="bg-gradient-to-r from-pink-50 to-white p-6 rounded-2xl border border-gray-200 shadow-sm hover:shadow-md transition group">
                <div class="flex items-center gap-4">
                    <div
                        class="w-12 h-12 flex items-center justify-center rounded-xl bg-pink-600 text-white text-2xl group-hover:scale-105 transition">
                        👤
                    </div>
                    <div>
                        <h2 class="text-lg font-semibold text-gray-800">Manage Users</h2>
                        <p class="text-gray-600 text-sm">Add, edit, and delete users</p>
                    </div>
                </div>
                <div class="mt-4">
                    <a href="{{ route('admin.users.index') }}"
                       class="inline-block px-4 py-2 rounded-xl bg-pink-600 text-white text-sm font-medium hover:bg-pink-700 transition">
                        Manage Users
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
