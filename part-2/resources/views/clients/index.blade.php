@extends('layouts.app')

@section('content')
    <div class="flex flex-col items-center justify-start min-h-screen px-4 bg-gray-900 text-gray-100 py-8 space-y-6">

        <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight text-[#FD6F00] drop-shadow-lg">
            CLIENT MANAGEMENT MODULE
        </h1>

        <div class="bg-gray-800 p-6 md:p-8 rounded-xl shadow-2xl w-full max-w-6xl border border-gray-700">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6 gap-4">
                <h2 class="text-3xl font-extrabold text-white tracking-tight flex items-center gap-3">
                    <a href="{{ route('home') }}" class="text-[#FD6F00] hover:text-[#e96300] font-medium text-2xl transition">
                        &larr;
                    </a>
                    Clients
                </h2>

                <a href="{{ route('clients.create') }}"
                    class="bg-[#FD6F00] hover:bg-[#e96300] text-white font-semibold py-2 px-5 rounded-lg transition shadow-md">
                    Add Client
                </a>
            </div>



            @if (session('success'))
                <div class="bg-green-600 text-white px-4 py-2 rounded-lg mb-4 shadow-sm">
                    {{ session('success') }}
                </div>
            @endif

            <form method="GET" class="flex flex-col md:flex-row md:items-center md:space-x-3 mb-6 gap-3">
                <input type="text" name="search" placeholder="Search by name or email" value="{{ request('search') }}"
                    class="flex-1 px-4 py-2 rounded-lg bg-gray-900 border border-gray-700 text-gray-100 focus:outline-none focus:ring-2 focus:ring-[#FD6F00] focus:border-transparent transition">

                <select name="status"
                    class="px-4 py-2 rounded-lg bg-gray-900 border border-gray-700 text-gray-100 focus:outline-none focus:ring-2 focus:ring-[#FD6F00] focus:border-transparent transition"
                    onchange="this.form.submit()">
                    <option value="">All Status</option>
                    <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>

                <button type="submit"
                    class="bg-[#FD6F00] hover:bg-[#e96300] text-white font-semibold py-2 px-5 rounded-lg shadow-md transition">
                    Filter
                </button>
            </form>

            <div class="overflow-x-auto rounded-lg shadow-inner border border-gray-700">
                <table class="min-w-full divide-y divide-gray-700 text-gray-100">
                    <thead class="bg-gray-700 uppercase text-gray-300 text-sm tracking-wider">
                        <tr>
                            <th class="px-4 py-3 text-left">ID</th>
                            <th class="px-4 py-3 text-left">Name</th>
                            <th class="px-4 py-3 text-left">Email</th>
                            <th class="px-4 py-3 text-left">Status</th>
                            <th class="px-4 py-3 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-gray-800 divide-y divide-gray-700">
                        @forelse($clients as $client)
                            <tr class="hover:bg-gray-700 transition">
                                <td class="px-4 py-3">{{ $client->id }}</td>
                                <td class="px-4 py-3">{{ $client->name }}</td>
                                <td class="px-4 py-3">{{ $client->email }}</td>
                                <td class="px-4 py-3 capitalize">{{ $client->status }}</td>
                                <td class="px-4 py-3 flex gap-2">
                                    <a href="{{ route('clients.edit', $client->id) }}"
                                        class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded-lg shadow-sm transition text-sm font-medium">
                                        Edit
                                    </a>
                                    <form action="{{ route('clients.destroy', $client->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded-lg shadow-sm transition text-sm font-medium">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-6 text-center text-gray-400">
                                    No clients found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
