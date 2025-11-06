@extends('layouts.app')

@section('content')
    <section class="min-h-screen flex flex-col justify-center items-center bg-gray-900 text-gray-100 text-center px-6">
        <div class="bg-gray-800 shadow-xl rounded-lg p-10 max-w-xl w-full">
            <h1 class="text-4xl font-extrabold text-white mb-4">
                Junior Web Developer Technical Exam | PART 1
            </h1>

            <p class="text-gray-400 mb-8">
                Hi, I’m <span class="font-semibold" style="color: #FD6F00;">Simon Pasag</span><br>
                Junior Web Developer.
            </p>

            <a href="https://mondev.vercel.app" target="_blank"
                class="inline-block px-6 py-3 rounded-md text-white font-medium transition"
                style="background-color: #FD6F00; hover:opacity-90;">
                Visit My Portfolio
            </a>

            <a href="/clients" class="inline-block mt-4 px-6 py-3 rounded-md font-medium transition border"
                style="border-color: #FD6F00; color: #FD6F00;"
                onmouseover="this.style.backgroundColor='#FD6F00';this.style.color='#fff';"
                onmouseout="this.style.backgroundColor='transparent';this.style.color='#FD6F00';">
                View Task Result
            </a>
        </div>

        <footer class="mt-10 text-gray-500 text-sm">
            &copy; {{ date('Y') }} Simon Pasag. All rights reserved.
        </footer>
    </section>
@endsection
