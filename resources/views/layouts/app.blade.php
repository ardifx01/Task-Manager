<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex min-h-screen">

    <!-- Sidebar -->
<aside class="fixed top-0 left-0 w-64 h-screen bg-gradient-to-b from-blue-700 to-blue-800 text-white p-6 shadow-lg flex flex-col">
    <!-- Logo -->
    <h2 class="text-2xl font-extrabold tracking-wide mb-10">Task Manager</h2>

    <!-- Navigation -->
    <nav class="flex-1 overflow-y-auto">
        <ul class="space-y-2 text-sm font-medium">
            <li>
                <a href="{{ Auth::user()->is_role === 'admin' ? url('admin/dashboard') : url('user/dashboard') }}"
                   class="flex items-center gap-3 py-2.5 px-4 rounded-lg hover:bg-blue-600 transition">
                    <span class="text-lg">🏠</span> Dashboard
                </a>
            </li>

            @if(Auth::user()->is_role === 'admin')
                <li>
                    <a href="{{ route('admin.projects.index') }}"
                       class="flex items-center gap-3 py-2.5 px-4 rounded-lg hover:bg-blue-600 transition">
                        <span class="text-lg">📂</span> Manage Project & Task
                    </a>
                </li>
                <li>
                    <a href="{{ url('admin/users') }}"
                       class="flex items-center gap-3 py-2.5 px-4 rounded-lg hover:bg-blue-600 transition">
                        <span class="text-lg">👤</span> Manage User
                    </a>
                </li>
            @else
                <li>
                    <a href="{{ url('user/tasks') }}"
                       class="flex items-center gap-3 py-2.5 px-4 rounded-lg hover:bg-blue-600 transition">
                        <span class="text-lg">📝</span> Lihat Task
                    </a>
                </li>
            @endif
        </ul>
    </nav>

    <!-- Logout -->
    <div class="mt-10">
        <a href="{{ route('logout') }}"
           class="flex items-center justify-center gap-2 py-2.5 px-4 rounded-lg bg-red-500 hover:bg-red-600 transition font-semibold">
            🚪 Logout
        </a>
    </div>
</aside>

<!-- Main Content -->
<main class="flex-1 p-8 overflow-y-auto ml-64"> <!-- Tambah ml-64 biar konten tidak ketutup sidebar -->
    @yield('content')
</main>
