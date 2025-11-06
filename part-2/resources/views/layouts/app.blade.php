<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Simon Pasag | Junior Web Developer Exam</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css'])
</head>

<body style="font-family: 'Poppins', sans-serif;"
    class="bg-gray-900 text-gray-100 antialiased selection:bg-[#FD6F00]/70 selection:text-white">
    <div class="min-h-screen flex flex-col">
        @yield('content')

        <footer class="mt-auto py-6 text-center text-sm text-gray-500 border-t border-gray-800">
            &copy; {{ date('Y') }} Simon Pasag. All rights reserved.
        </footer>
    </div>
</body>

</html>
