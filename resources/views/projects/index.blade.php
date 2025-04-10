<x-layout>
    <main class="max-w-5xl mx-auto">
        <!-- Title -->
        <section class="text-center mb-10">
            <h1 class="text-4xl font-bold mb-4">Portfolio Projects</h1>

            <!-- Search form -->
            <form method="GET" action="{{ route('projects.index') }}" class="mt-4">
                <input type="text" name="search" value="{{ request('search') }}"
                    class="px-4 py-2 rounded-lg w-1/2 focus:outline-none focus:ring-2 focus:ring-indigo-500 text-black"
                    placeholder="Search projects...">
                <button type="submit"
                    class="ml-2 px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                    Search
                </button>
            </form>
        </section>

        <!-- Project Cards -->
        <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse ($projects as $project)
                <a href="{{ route('projects.show', $project->id) }}"
                    class="bg-white/10 p-5 rounded-xl shadow-md flex flex-col justify-between hover:bg-white/20 transition duration-200 cursor-pointer">
                    <div>
                        <h2 class="text-xl font-semibold mb-2 text-white">{{ $project->title }}</h2>
                        <p class="text-white/70 text-sm">{{ $project->description }}</p>
                    </div>

                    <div class="mt-4 flex items-center gap-2">
                        <!-- Company logo -->
                        @if ($project->user && $project->user->employer && $project->user->employer->logo)
                            <img src="{{ asset('storage/' . $project->user->employer->logo) }}" alt="Company Logo"
                                class="w-10 h-10 rounded-full object-cover">
                        @else
                            <img src="{{ asset('images/default-logo.png') }}" alt="Default Logo"
                                class="w-10 h-10 rounded-full object-cover">
                        @endif

                        <!-- User name -->
                        <span class="text-white text-sm">
                            @if ($project->user)
                                {{ $project->user->name ?? 'No User' }}
                            @else
                                Guest <!-- Tizimga kirmagan foydalanuvchi uchun default qiymat -->
                            @endif
                        </span>
                    </div>
                </a>
            @empty
                <p class="text-white/70 text-center col-span-3">No projects found. Be the first to share one!</p>
            @endforelse
        </section>

        <!-- Pagination -->
        <div class="mt-10">
            {{ $projects->links('pagination::tailwind') }}
        </div>
    </main>
</x-layout>
