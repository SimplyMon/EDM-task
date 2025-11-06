@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-center min-h-screen px-4 bg-gray-900 text-gray-100">
        <div class="bg-gray-800 p-8 md:p-10 rounded-xl shadow-2xl w-full max-w-lg border border-gray-700">
            <div class="flex items-center justify-between mb-6">
                <a href="{{ route('clients.index') }}"
                    class="bg-gray-600 hover:bg-gray-500 text-white font-semibold py-2 px-4 rounded-lg transition shadow-md">
                    Go Back
                </a>
                <h1 class="text-3xl font-extrabold text-white">Add Client</h1>
            </div>

            @if ($errors->any())
                <div class="bg-red-600 text-white px-4 py-3 rounded-lg mb-4 shadow-sm">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('clients.store') }}" method="POST" class="space-y-5">
                @csrf

                <div>
                    <label for="name" class="block text-gray-300 mb-2 font-medium">Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required maxlength="255"
                        class="w-full px-4 py-3 rounded-lg bg-gray-900 border border-gray-700 text-gray-100 focus:outline-none focus:ring-2 focus:ring-[#FD6F00] focus:border-transparent transition">
                </div>

                <div>
                    <label for="email" class="block text-gray-300 mb-2 font-medium">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required
                        class="w-full px-4 py-3 rounded-lg bg-gray-900 border border-gray-700 text-gray-100 focus:outline-none focus:ring-2 focus:ring-[#FD6F00] focus:border-transparent transition">
                </div>

                <div>
                    <label for="status" class="block text-gray-300 mb-2 font-medium">Status</label>
                    <select name="status" id="status" required
                        class="w-full px-4 py-3 rounded-lg bg-gray-900 border border-gray-700 text-gray-100 focus:outline-none focus:ring-2 focus:ring-[#FD6F00] focus:border-transparent transition">
                        <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <button type="submit"
                    class="w-full bg-[#FD6F00] hover:bg-[#e96300] text-white font-semibold py-3 px-4 rounded-lg shadow-md transition">
                    Add Client
                </button>
            </form>
        </div>
    </div>
@endsection
