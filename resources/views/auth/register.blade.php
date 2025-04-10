<x-layout>
    <h1 class="text-center text-4xl text-bold mb-10"></h1>

    <div class="max-w-lg mx-auto bg-white dark:bg-gray-800 rounded-lg shadow-md px-8 py-10 flex flex-col items-center">
        <h1 class="text-4xl font-bold text-center text-gray-700 dark:text-gray-200 mb-8">Register</h1>
        <form action="/register" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')

            <div class="flex items-start flex-col justify-start">
                <label for="name" class="text-sm text-gray-700 dark:text-gray-200 mr-2">Name:</label>
                <input type="text" id="name" name="name" class="w-full px-3 dark:text-white dark:bg-gray-900 py-2 rounded-md border border-gray-300 dark:border-gray-700 focus:outline-none focus:ring-1 focus:ring-blue-500">
            </div>

            <div class="flex items-start flex-col justify-start">
                <label for="email" class="text-sm text-black dark:text-gray-200 mr-2">Email:</label>
                <input type="email" id="email" name="email" class="w-full px-3 dark:bg-gray-900 text-black dark:text-white py-2 rounded-md border border-gray-300 dark:border-gray-700 focus:outline-none focus:ring-1 focus:ring-blue-500">
            </div>

            <div class="flex items-start flex-col justify-start">
                <label for="password" class="text-sm text-gray-700 dark:text-gray-200 mr-2">Password:</label>
                <input type="password" id="password" name="password" class="w-full px-3 text-gray-900 dark:bg-gray-900 dark:text-white py-2 rounded-md border border-gray-300 dark:border-gray-700 focus:outline-none focus:ring-1 focus:ring-blue-500">
            </div>

            <div class="flex items-start flex-col justify-start">
                <label for="password_confirmation" class="text-sm text-gray-700 dark:text-gray-200 mr-2">Confirm Password:</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="w-full px-3 text-gray-900 dark:bg-gray-900 dark:text-white py-2 rounded-md border border-gray-300 dark:border-gray-700 focus:outline-none focus:ring-1 focus:ring-blue-500">
            </div>

            <ul>
                @foreach ($errors as $error)
                    <li class="text-red-700 text-center text-xs">
                        {{$error}}
                    </li>
                @endforeach
            </ul>

            <hr>

            <div class="flex items-start flex-col justify-start">
                <label for="employer" class="text-sm text-gray-700 dark:text-gray-200 mr-2">Employer:</label>
                <input type="text" id="employer" name="employer" class="w-full px-3 text-gray-900 dark:bg-gray-900 dark:text-white py-2 rounded-md border border-gray-300 dark:border-gray-700 focus:outline-none focus:ring-1 focus:ring-blue-500">
            </div>

            <div class="flex items-start flex-col justify-start">
                <label for="logo" class="text-sm text-gray-700 dark:text-gray-200 mr-2">Employer Logo:</label>
                <input type="file" id="logo" name="logo" class="w-full px-3 text-gray-900 dark:bg-gray-900 dark:text-white py-2 rounded-md border border-gray-300 dark:border-gray-700 focus:outline-none focus:ring-1 focus:ring-blue-500">
            </div>

            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded-md shadow-sm">Register</button>
        </form>

        <div class="mt-4 text-center">
            <span class="text-sm text-gray-500 dark:text-gray-300">Already have an account? </span>
            <a href="/login" class="text-blue-500 hover:text-blue-600">Login</a>
        </div>
    </div>

</x-layout>
