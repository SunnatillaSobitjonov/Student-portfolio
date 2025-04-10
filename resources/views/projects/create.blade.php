<x-layout>
    <main class="mt-10 max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold mb-6">Create a New Project</h1>

        <form method="POST" action="{{ route('projects.store') }}" class="space-y-5">
            @csrf

            <!-- Project Title -->
            <div>
                <label for="title" class="block text-sm font-semibold mb-1">Project Title</label>
                <input type="text" name="title" id="title" class="w-full rounded-xl px-4 py-2 bg-white/10 border border-white/20" required>
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-sm font-semibold mb-1">Description</label>
                <textarea name="description" id="description" rows="4" class="w-full rounded-xl px-4 py-2 bg-white/10 border border-white/20"></textarea>
            </div>

            <!-- Link -->
            <div>
                <label for="link" class="block text-sm font-semibold mb-1">Project Link (optional)</label>
                <input type="url" name="link" id="link" class="w-full rounded-xl px-4 py-2 bg-white/10 border border-white/20">
            </div>

            <!-- Survey: Name -->
            <div>
                <label for="name" class="block text-sm font-semibold mb-1">Your Name</label>
                <input type="text" name="name" id="name" class="w-full rounded-xl px-4 py-2 bg-white/10 border border-white/20">
            </div>

            <!-- Survey: Email -->
            <div>
                <label for="email" class="block text-sm font-semibold mb-1">Email Address</label>
                <input type="email" name="email" id="email" class="w-full rounded-xl px-4 py-2 bg-white/10 border border-white/20">
            </div>

            <!-- Survey: Gender -->
            <div>
                <label for="gender" class="block text-sm font-semibold mb-1">Gender</label>
                <select name="gender" id="gender" class="w-full rounded-xl px-4 py-2 bg-white/10 border border-white/20">
                    <option value="">-- Select --</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>

            <!-- Survey: Favorite Technologies -->
            <div>
                <label for="technologies" class="block text-sm font-semibold mb-1">Favorite Technologies</label>
                <div class="space-y-2">
                    <div>
                        <input type="checkbox" name="technologies[]" value="Laravel" id="tech-laravel" class="mr-2">
                        <label for="tech-laravel">Laravel</label>
                    </div>
                    <div>
                        <input type="checkbox" name="technologies[]" value="Vue.js" id="tech-vue" class="mr-2">
                        <label for="tech-vue">Vue.js</label>
                    </div>
                    <div>
                        <input type="checkbox" name="technologies[]" value="React" id="tech-react" class="mr-2">
                        <label for="tech-react">React</label>
                    </div>
                    <div>
                        <input type="checkbox" name="technologies[]" value="Tailwind" id="tech-tailwind" class="mr-2">
                        <label for="tech-tailwind">Tailwind</label>
                    </div>
                </div>
            </div>

            <!-- Survey: Experience Level -->
            <div>
                <label for="experience" class="block text-sm font-semibold mb-1">Experience Level</label>
                <div class="space-y-2">
                    <div>
                        <input type="radio" name="experience" value="beginner" id="exp-beginner" class="mr-2">
                        <label for="exp-beginner">Beginner</label>
                    </div>
                    <div>
                        <input type="radio" name="experience" value="intermediate" id="exp-intermediate" class="mr-2">
                        <label for="exp-intermediate">Intermediate</label>
                    </div>
                    <div>
                        <input type="radio" name="experience" value="advanced" id="exp-advanced" class="mr-2">
                        <label for="exp-advanced">Advanced</label>
                    </div>
                </div>
            </div>

            <!-- Survey: Feedback -->
            <div>
                <label for="feedback" class="block text-sm font-semibold mb-1">Any Feedback?</label>
                <textarea name="feedback" id="feedback" rows="3" class="w-full rounded-xl px-4 py-2 bg-white/10 border border-white/20"></textarea>
            </div>

            <!-- Submit -->
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-xl">
                Submit
            </button>
        </form>
    </main>
</x-layout>
