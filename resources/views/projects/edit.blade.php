<x-layout>
    <main class="mt-10 max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold mb-6">Edit Project: {{ $project->title }}</h1>

        <form method="POST" action="{{ route('projects.update', $project->id) }}" class="space-y-5">
            @csrf
            @method('PUT')

            <!-- Project Title -->
            <div>
                <label for="title" class="block text-sm font-semibold mb-1">Project Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $project->title) }}" class="w-full rounded-xl px-4 py-2 bg-white/10 border border-white/20" required>
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-sm font-semibold mb-1">Description</label>
                <textarea name="description" id="description" rows="4" class="w-full rounded-xl px-4 py-2 bg-white/10 border border-white/20">{{ old('description', $project->description) }}</textarea>
            </div>

            <!-- Project Link -->
            <div>
                <label for="link" class="block text-sm font-semibold mb-1">Project Link (optional)</label>
                <input type="url" name="link" id="link" value="{{ old('link', $project->link) }}" class="w-full rounded-xl px-4 py-2 bg-white/10 border border-white/20">
            </div>

            <!-- Survey: Name -->
            <div>
                <label for="name" class="block text-sm font-semibold mb-1">Your Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $project->name) }}" class="w-full rounded-xl px-4 py-2 bg-white/10 border border-white/20">
            </div>

            <!-- Survey: Email -->
            <div>
                <label for="email" class="block text-sm font-semibold mb-1">Email Address</label>
                <input type="email" name="email" id="email" value="{{ old('email', $project->email) }}" class="w-full rounded-xl px-4 py-2 bg-white/10 border border-white/20">
            </div>

            <!-- Survey: Gender -->
            <div>
                <label for="gender" class="block text-sm font-semibold mb-1">Gender</label>
                <select name="gender" id="gender" class="w-full rounded-xl px-4 py-2 bg-white/10 border border-white/20">
                    <option value="male" {{ old('gender', $project->gender) == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ old('gender', $project->gender) == 'female' ? 'selected' : '' }}>Female</option>
                    <option value="other" {{ old('gender', $project->gender) == 'other' ? 'selected' : '' }}>Other</option>
                </select>
            </div>

            <!-- Survey: Favorite Technologies -->
            <div>
                <label for="technologies" class="block text-sm font-semibold mb-1">Favorite Technologies</label>
                <div class="space-y-2">
                    @php
                        // Decode technologies from the database or use old input if available
                        $technologies = old('technologies', json_decode($project->technologies, true)) ?? [];
                    @endphp

                    <div>
                        <input type="checkbox" name="technologies[]" value="Laravel" id="tech-laravel" {{ in_array('Laravel', $technologies) ? 'checked' : '' }} class="mr-2">
                        <label for="tech-laravel">Laravel</label>
                    </div>
                    <div>
                        <input type="checkbox" name="technologies[]" value="Vue.js" id="tech-vue" {{ in_array('Vue.js', $technologies) ? 'checked' : '' }} class="mr-2">
                        <label for="tech-vue">Vue.js</label>
                    </div>
                    <div>
                        <input type="checkbox" name="technologies[]" value="React" id="tech-react" {{ in_array('React', $technologies) ? 'checked' : '' }} class="mr-2">
                        <label for="tech-react">React</label>
                    </div>
                    <div>
                        <input type="checkbox" name="technologies[]" value="Tailwind" id="tech-tailwind" {{ in_array('Tailwind', $technologies) ? 'checked' : '' }} class="mr-2">
                        <label for="tech-tailwind">Tailwind</label>
                    </div>
                </div>
            </div>

            <!-- Survey: Experience Level -->
            <div>
                <label for="experience" class="block text-sm font-semibold mb-1">Experience Level</label>
                <div class="space-y-2">
                    <div>
                        <input type="radio" name="experience" value="beginner" id="exp-beginner" {{ old('experience', $project->experience) == 'beginner' ? 'checked' : '' }} class="mr-2">
                        <label for="exp-beginner">Beginner</label>
                    </div>
                    <div>
                        <input type="radio" name="experience" value="intermediate" id="exp-intermediate" {{ old('experience', $project->experience) == 'intermediate' ? 'checked' : '' }} class="mr-2">
                        <label for="exp-intermediate">Intermediate</label>
                    </div>
                    <div>
                        <input type="radio" name="experience" value="advanced" id="exp-advanced" {{ old('experience', $project->experience) == 'advanced' ? 'checked' : '' }} class="mr-2">
                        <label for="exp-advanced">Advanced</label>
                    </div>
                </div>
            </div>

            <!-- Survey: Feedback -->
            <div>
                <label for="feedback" class="block text-sm font-semibold mb-1">Any Feedback?</label>
                <textarea name="feedback" id="feedback" rows="3" class="w-full rounded-xl px-4 py-2 bg-white/10 border border-white/20">{{ old('feedback', $project->feedback) }}</textarea>
            </div>

            <!-- Submit -->
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-xl">
                Update Project
            </button>
        </form>
    </main>
</x-layout>
