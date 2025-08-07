<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex">

    <!-- Sidebar -->
    <aside class="w-64 bg-blue-700 text-white min-h-screen p-4">
        <h2 class="text-xl font-bold mb-6">Task Manager</h2>
        <nav>
            <ul class="space-y-2">
                <li>
                    <a href="{{ Auth::user()->is_role === 'admin' ? url('admin/dashboard') : url('user/dashboard') }}"
                       class="block py-2 px-4 rounded hover:bg-blue-600">
                        Dashboard
                    </a>
                </li>

                @if(Auth::user()->is_role === 'admin')
                    <li>
                        <a href="{{ url('admin/tasks') }}"
                           class="block py-2 px-4 rounded hover:bg-blue-600">
                            Manage Task User
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('admin/users') }}"
                           class="block py-2 px-4 rounded hover:bg-blue-600">
                            Manage User
                        </a>
                    </li>
                @else
                    <li>
                        <a href="{{ url('user/tasks') }}"
                           class="block py-2 px-4 rounded hover:bg-blue-600">
                            Lihat Task
                        </a>
                    </li>
                @endif

                <li>
                    <a href="{{ route('logout') }}"
                       class="block py-2 px-4 rounded bg-red-500 hover:bg-red-600">
                        Logout
                    </a>
                </li>
            </ul>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6">
        @yield('content')
    </main>

</body>
</html>
