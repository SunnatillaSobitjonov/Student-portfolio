<x-layout>
    <h1 class="text-center text-4xl font-bold mb-10">Finding Jobs</h1>

    <div class="mt-6 space-y-6">
        @foreach ($jobs as $job)
            <x-card-wider :$job/>
        @endforeach
    </div>

</x-layout>