<x-layout>
    <main class="mt-10 max-w-5xl mx-auto">
        <h1 class="text-3xl font-bold mb-6 text-center">Students</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($students as $student)
                <div class="bg-white/10 p-4 rounded-xl shadow-md">
                    <h2 class="font-semibold text-lg">{{ $student->name }}</h2>
                    <p class="text-sm text-white/70">Email: {{ $student->email }}</p>
                </div>
            @endforeach
        </div>
    </main>
</x-layout>
