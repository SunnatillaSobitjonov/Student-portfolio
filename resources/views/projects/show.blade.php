<x-layout>
    <main class="max-w-4x3 mx-auto p-6 mb-20">
        <h1 class="text-4xl font-bold mb-4 text-white">Portfolio</h1>
        <div class="bg-white/10 p-6 rounded-xl shadow-lg">

            <div class="mb-6">
                <h2 class="text-2xl font-semibold">Survey Details</h2>
                <h1 class="text-4xl font-bold mb-4 text-white">{{ $project->title }}</h1>

                <p class="text-gray-300 text-lg">{{ $project->description }}</p>
                <p><strong>Your Name:</strong> {{ $project->name }}</p>
                <p><strong>Email:</strong> {{ $project->email }}</p>
                <p><strong>Gender:</strong> {{ ucfirst($project->gender) }}</p>

                {{-- Fix for the technologies field --}}
                <p><strong>Technologies:</strong> 
                    @if($project->technologies)
                        {{ is_array($project->technologies) ? implode(', ', $project->technologies) : implode(', ', json_decode($project->technologies)) }}
                    @else
                        No technologies listed
                    @endif
                </p>

                <p><strong>Experience Level:</strong> {{ ucfirst($project->experience) }}</p>
                <p><strong>Feedback:</strong> {{ $project->feedback }}</p>
            </div>

            {{-- Faqat portfolio egasi uchun Edit/Delete tugmalari --}}
            @auth
            @if (auth()->id() === $project->user_id)  {{-- Faqat portfeloni yaratgan foydalanuvchi uchun --}}
            <div class="flex gap-4 mt-6">
                <a href="{{ route('projects.edit', $project->id) }}"
                    class="inline-block px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">
                    ✏️ Edit
                </a>

                <form action="{{ route('projects.destroy', $project->id) }}" method="POST"
                    onsubmit="return confirm('Are you sure?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="px-4 py-2 bg-red-600 text-white rounded-lg shadow hover:bg-red-700 transition">
                        🗑️ Delete
                    </button>
                </form>
            </div>
            @endif
            @endauth
        </div>
    </main>
</x-layout>
