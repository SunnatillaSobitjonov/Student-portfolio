<x-layout>
    <main class="mt-10 max-w-[968px] mx-auto space-y-10">

        <!-- Hero Search Section -->
        <section class="text-center pt-6">
            <h1 class="font-bold text-4xl">Let's Find Your Next Job</h1>

            <form action="/search" method="GET" class="mt-6">
                <input
                    type="text"
                    name="search"
                    placeholder="Web Developer..."
                    class="rounded-xl bg-white/25 border-white/10 px-5 py-4 w-full max-w-xl"
                />
            </form>
        </section>

        <!-- Featured Jobs Section -->
        <section>
            <div class="inline-flex items-center gap-x-2 mb-6">
                <span class="w-2 h-2 bg-white inline-block"></span>
                <h3 class="font-bold text-lg">Featured Jobs</h3>
            </div>

            <div class="grid lg:grid-cols-3 gap-8 mt-6">
                @foreach ($featuredJobs as $job)
                    <x-card :$job/>
                @endforeach
            </div>
        </section>

        <!-- Tags Section -->
        <section>
            <div class="inline-flex items-center gap-x-2 mb-6">
                <span class="w-2 h-2 bg-white inline-block"></span>
                <h3 class="font-bold text-lg">Tags</h3>
            </div>

            <div class="mt-6 space-x-1">
                @foreach ($tags as $tag)
                    <a
                        href="/tags/{{ $tag->name }}"
                        class="bg-white/10 px-3 hover:bg-white/25 rounded-xl text-2xs font-bold transition-colors duration-300"
                    >
                        {{ $tag->name }}
                    </a>
                @endforeach
            </div>
        </section>

        <!-- Recent Jobs Section -->
        <section>
            <div class="inline-flex items-center gap-x-2 mb-6">
                <span class="w-2 h-2 bg-white inline-block"></span>
                <h3 class="font-bold text-lg">Recent Jobs</h3>
            </div>

            <div class="mt-6 space-y-6">
                @foreach ($jobs as $job)
                    <x-card-wider :$job/>
                @endforeach
            </div>
        </section>

    </main>
</x-layout>
