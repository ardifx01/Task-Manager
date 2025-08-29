@extends('layouts.app')

@section('title', 'User Dashboard')

@section('content')
    <div class="space-y-6">
        {{-- Title --}}
        <h1 class="text-3xl font-bold text-gray-800">
            Welcome, <span class="text-indigo-600">{{ Auth::user()->name }}</span> 👋
        </h1>

        {{-- Card --}}
        <div
            class="bg-gradient-to-r from-indigo-50 to-white p-6 rounded-2xl border border-gray-200 shadow-sm hover:shadow-md transition">
            <h2 class="text-xl font-semibold text-gray-800 mb-2">📌 View Tasks</h2>
            <p class="text-gray-600">
                List of tasks assigned by the admin
            </p>

            <div class="mt-4">
                <a href="{{ route('user.tasks.index') }}" class="inline-block px-4 py-2 rounded-xl bg-indigo-600 text-white text-sm font-medium hover:bg-indigo-700 transition">
                    View All Tasks
                </a>
            </div>
        </div>
    </div>
@endsection

