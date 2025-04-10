<x-layout>
    <main class="mt-10 max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold mb-4 text-center">Contact Us</h1>
        <p class="text-white/70 mb-6 text-center">Have questions or feedback? Reach out to us anytime.</p>
        <form class="space-y-4 bg-white/10 p-6 rounded-xl">
            <div>
                <label class="block mb-1 text-sm font-medium">Your Name</label>
                <input type="text" class="w-full px-4 py-2 rounded-xl bg-white/10 border border-white/20" />
            </div>
            <div>
                <label class="block mb-1 text-sm font-medium">Your Email</label>
                <input type="email" class="w-full px-4 py-2 rounded-xl bg-white/10 border border-white/20" />
            </div>
            <div>
                <label class="block mb-1 text-sm font-medium">Message</label>
                <textarea rows="4" class="w-full px-4 py-2 rounded-xl bg-white/10 border border-white/20"></textarea>
            </div>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-xl">Send</button>
        </form>
    </main>
</x-layout>
