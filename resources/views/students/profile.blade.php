<x-layout>
    <main class="max-w-4xl mx-auto mt-10 p-6 space-y-8">
        <h1 class="text-4xl font-bold text-center text-white">My Profile</h1>

        <!-- Profile Info -->
        <div class="flex items-center bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 p-6 rounded-2xl shadow-xl text-white">
            <div class="mr-6">
                @if (auth()->check() && auth()->user()->employer && auth()->user()->employer->logo)
                <img src="{{ asset('storage/' . auth()->user()->employer->logo) }}" alt="Company Logo"
                    class="w-24 h-24 rounded-full object-cover border-4 border-white shadow-lg">
                @else
                <img src="{{ asset('images/default-logo.png') }}" alt="Default Logo"
                    class="w-24 h-24 rounded-full object-cover border-4 border-white shadow-lg">
                @endif
            </div>
            <div>
                @auth
                <p><strong>Name:</strong> {{ auth()->user()->name }}</p>
                <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
                <p><strong>Joined:</strong> {{ auth()->user()->created_at->format('d M Y') }}</p>
                @endauth
            </div>
        </div>

        <!-- Edit Logo Section -->
        @auth
        <div class="flex items-center justify-between bg-white/10 p-6 rounded-2xl shadow-lg backdrop-blur-md border border-white/20 mt-6">
            <div class="text-white">
                <h2 class="text-xl font-semibold">Change Logo</h2>
            </div>
            <div>
                <form action="{{ route('updateImage') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="logo" class="file-input" accept="image/*" />
                    <button type="submit" class="ml-4 px-6 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition">
                        Upload New Logo
                    </button>
                </form>

            </div>
        </div>
        @endauth

        <!-- Portfolio Section -->
        <div class="bg-white/10 p-6 rounded-2xl shadow-lg backdrop-blur-md border border-white/20 mt-8">
            <h2 class="text-2xl font-bold text-white mb-6 border-b border-white/30 pb-2">My Portfolio</h2>

            @php
            $user = auth()->user();
            $projects = $user->projects;
            @endphp

            @if ($projects->count() > 0)
            <ul class="space-y-6">
                @foreach ($projects as $project)
                <li class="p-6 bg-white/30 rounded-xl shadow-md hover:shadow-lg transition duration-300">
                    <h3 class="text-xl font-semibold text-white">{{ $project->title }}</h3>
                    <p class="text-white mt-2">{{ $project->description }}</p>

                    <div class="mt-4 flex space-x-4">
                        <a href="{{ route('projects.show', $project->id) }}"
                            class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition">View</a>

                        <a href="{{ route('projects.edit', $project->id) }}"
                            class="px-4 py-2 bg-yellow-400 text-black rounded-md hover:bg-yellow-500 transition">Edit</a>

                        <form action="{{ route('projects.destroy', $project->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this portfolio?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 transition">Delete</button>
                        </form>
                    </div>
                </li>
                @endforeach
            </ul>
            @else
            <p class="text-white text-center">You have no portfolio projects yet.</p>
            @endif
        </div>
    </main>
</x-layout>