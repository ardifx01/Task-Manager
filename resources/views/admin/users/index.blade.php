@extends('layouts.app')

@section('title', 'Manage Users')

@section('content')
    <h1 class="text-2xl font-bold mb-4">User List</h1>

    <div class="flex items-center justify-between mb-4">
        <a href="{{ route('admin.users.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">
            Add User
        </a>

        <form method="GET" action="{{ route('admin.users.index') }}" class="flex gap-2">
            <input type="text" name="search" placeholder="Search by name/email..."
                   value="{{ request('search') }}"
                   class="border px-3 py-1 rounded">
            <button type="submit" class="bg-gray-600 text-white px-3 py-1 rounded">Search</button>
        </form>
    </div>

    @if(count($users) > 0)
        <table class="w-full bg-white shadow rounded">
            <thead>
                <tr>
                    <th class="p-2 border">Username</th>
                    <th class="p-2 border">Email</th>
                    <th class="p-2 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class="border p-2">{{ $user->name }}</td>
                        <td class="border p-2">{{ $user->email }}</td>
                        <td class="border p-2 flex gap-3">
                            <a href="{{ route('admin.users.edit', $user->id) }}" 
                               class="text-blue-500 hover:underline">Edit</a>

                            <form action="{{ route('admin.users.destroy', $user->id) }}" 
                                  method="POST" 
                                  class="inline">
                                @csrf @method('DELETE')
                                <button onclick="return confirm('Are you sure?')" 
                                        class="text-red-500 hover:underline">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="text-gray-600">No users found.</p>
    @endif
@endsection
