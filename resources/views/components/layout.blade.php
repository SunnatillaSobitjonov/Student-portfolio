<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pixel Positions</title>

    <link href="https://fonts.googleapis.com/css?family=Hanken Grotesk" rel="stylesheet">
    @vite(['resources/js/app.js', 'resources/css/app.css'])

    </script>
</head>
<body class="bg-black text-white font-hanken-grotesk mb-10">
<div class="px-10">
    <nav class="flex justify-between items-center py-4 border-b border-white/10" >
        <div>
            <a href="/">
                <img src="{{Vite::asset('resources/images/logo.svg')}}">
            </a>
        </div>

        <div class="space-x-6 font-bold">
            <a href="/">Jobs</a>
            <a href="">Careers</a>
            <a href="">Salaries</a>
            <a href="">Companies</a>
        </div>


        

        <div>
            
        @guest
            
            <button class="px-6 py-2 min-w-[120px] text-center text-white border border-white rounded bg-black hover:bg-white hover:text-black active:bg-white focus:outline-none focus:ring">
            <a href="/register">Sign up</a></button>

            <button class="px-6 py-2 min-w-[120px] text-center text-white border border-white rounded bg-black hover:bg-white hover:text-black active:bg-white focus:outline-none focus:ring">
            <a href="/login">Login</a></button>

        @endguest
    <div class="flex items-center space-x-4">
        @auth
            <a href="/jobs/create">Post A Job</a>
        @endauth

        @auth
            <!-- <a href="/logout">Logout</a> -->
            <form action="/logout" method="POST">
                @csrf
                @method('DELETE')
                <!-- <button type="submit">Logout</button> -->
                <button class="px-6 py-2 min-w-[120px] text-center text-white border border-red-500 rounded bg-red-500 hover:bg-white hover:text-red-500 active:bg-red-500 focus:outline-none focus:ring"href="/download">Logout</button>
            </form>
        @endauth
    </div>
        </div>
    </nav>


    <main>
        {{$slot}}
    </main>

</div>
</body>
</html>