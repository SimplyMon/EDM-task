@extends('layouts.app')

@section('content')
    <div class="flex items-center justify-center min-h-screen px-4 bg-gray-900 text-gray-100">
        <div class="bg-gray-800 p-8 rounded-lg shadow-xl w-full max-w-lg border border-gray-700">
            <h1 class="text-3xl font-extrabold mb-6 text-white text-center">
                Add Client
            </h1>

            <form id="clientForm" class="space-y-5">
                @csrf

                <div>
                    <label class="block text-gray-300 mb-2" for="name">Name</label>
                    <input type="text" name="name" id="name" required maxlength="255"
                        class="w-full px-4 py-2 rounded-md bg-gray-900 border border-gray-700 text-gray-100 focus:outline-none focus:ring-2 focus:ring-[#FD6F00] focus:border-transparent">
                </div>

                <div>
                    <label class="block text-gray-300 mb-2" for="email">Email</label>
                    <input type="email" name="email" id="email" required
                        class="w-full px-4 py-2 rounded-md bg-gray-900 border border-gray-700 text-gray-100 focus:outline-none focus:ring-2 focus:ring-[#FD6F00] focus:border-transparent">
                </div>

                <div>
                    <label class="block text-gray-300 mb-2" for="status">Status</label>
                    <select name="status" id="status" required
                        class="w-full px-4 py-2 rounded-md bg-gray-900 border border-gray-700 text-gray-100 focus:outline-none focus:ring-2 focus:ring-[#FD6F00] focus:border-transparent">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>

                <button type="submit"
                    class="w-full bg-[#FD6F00] hover:bg-[#e96300] text-white font-semibold py-2 px-4 rounded-md transition">
                    Submit
                </button>
            </form>

            <h2 class="mt-6 text-lg font-semibold text-gray-200">Response:</h2>
            <pre id="response"
                class="bg-gray-900 border border-gray-700 p-4 rounded-md mt-2 text-gray-300 overflow-x-auto text-sm"></pre>
        </div>
    </div>

    <script>
        const form = document.getElementById('clientForm');
        const responseEl = document.getElementById('response');

        form.addEventListener('submit', async (e) => {
            e.preventDefault();

            const formData = new FormData(form);
            const data = Object.fromEntries(formData.entries());
            const token = document.querySelector('input[name="_token"]').value;

            try {
                const res = await fetch('/clients', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': token
                    },
                    body: JSON.stringify(data)
                });

                const json = await res.json();
                if (!res.ok) {
                    responseEl.textContent = `Error: ${JSON.stringify(json, null, 2)}`;
                    responseEl.style.color = '#f87171';
                    return;
                }

                responseEl.textContent = JSON.stringify(json, null, 2);
                responseEl.style.color = '#34d399';
            } catch (err) {
                responseEl.textContent = err;
                responseEl.style.color = '#f87171';
            }
        });
    </script>
@endsection
