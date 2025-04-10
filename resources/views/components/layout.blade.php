<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Portfolio</title>

    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk&display=swap" rel="stylesheet">
    @vite(['resources/js/app.js', 'resources/css/app.css'])
</head>
<body class="bg-gradient-to-r from-purple-900 via-violet-800 to-indigo-900 shadow-lg text-white ">

<div class="px-10">
    <nav class="flex justify-between items-center py-4 bg-gradient-to-r from-purple-900 via-violet-800 to-indigo-900 px-10 shadow-lg">
        <div>
            <a href="/">
                <img src="{{ Vite::asset('resources/images/logo.svg') }}" alt="Logo" class="h-8">
            </a>
        </div>

        <div class="space-x-6 font-semibold text-sm">
            <a href="/projects" class="hover:underline">Projects</a>
            <!-- <a href="/students" class="hover:underline">Students</a> -->
            <a href="/about" class="hover:underline">About</a>
            <a href="/contact" class="hover:underline">Contact</a>
        </div>

        <div class="flex items-center space-x-4">
            @guest
                <a href="/register" class="px-4 py-2 rounded-lg bg-purple-600 hover:bg-purple-700 text-white font-medium transition">Sign up</a>
                <a href="/login" class="px-4 py-2 border border-white rounded-lg hover:bg-white hover:text-black transition">Login</a>
            @endguest

            @auth
                <a href="/projects/create" class="text-sm hover:underline">Upload Project</a>
                <a href="/profile" class="text-sm hover:underline">My Profile</a>
                <form action="/logout" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-400 hover:text-white text-sm">Logout</button>
                </form>
            @endauth
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-4 pb-6 pt-6">
        {{ $slot }}
    </main>
</div>
    <footer class="mt-16 bg-gray-800 text-white py-6">
        <div class="max-w-5xl mx-auto px-4 flex flex-col md:flex-row items-center justify-between gap-4 text-sm">
            <p>&copy; {{ date('Y') }} MyPortfolio. All rights reserved.</p>
            <div class="flex gap-4">
                <a href="#" class="hover:underline">About</a>
                <a href="#" class="hover:underline">Contact</a>
                <a href="#" class="hover:underline">Privacy Policy</a>
            </div>
        </div>
    </footer>
</body>
</html>
