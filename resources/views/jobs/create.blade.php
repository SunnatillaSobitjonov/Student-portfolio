<x-layout>

<div class="mx-14 mt-10 border-2 border-blue-400 rounded-lg">
  <div class="mt-3 text-center text-4xl font-bold">Post a new Job</div>
  <div class="p-8">
    <form action="/jobs/store" method="POST">
        @csrf
        @method('POST')
    <div class="flex gap-4">
      <input type="text" name="title" class="mt-1 block w-1/2 rounded-md border border-slate-300 bg-black px-3 py-4 placeholder-slate-400 shadow-sm placeholder:font-semibold placeholder:text-gray-500 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 sm:text-sm" placeholder="Job Title *" />
      <input type="text" name="salary" class="mt-1 block w-1/2 rounded-md border border-slate-300 bg-black px-3 py-4 placeholder-slate-400 shadow-sm placeholder:font-semibold placeholder:text-gray-500 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 sm:text-sm" placeholder="Job Salary *" />
    </div>
    <div class="my-6 flex gap-4">
      <select name="schedule" id="select" class="block w-1/2 rounded-md border border-slate-300 bg-black px-3 py-4 font-semibold text-gray-500 shadow-sm focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 sm:text-sm">
        <option  class="font-semibold text-slate-300">Part time</option>
        <option  class="font-semibold text-slate-300">Full time</option>
      </select>
      <input type="text" name="location" class="mt-1 block w-1/2 rounded-md border border-slate-300 bg-black px-3 py-4 placeholder-slate-400 shadow-sm placeholder:font-semibold placeholder:text-gray-500 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 sm:text-sm" placeholder="Location *" />
    </div>
    <div class="flex items-center space-x-2 rounded p-2 accent-blue-700">
    <input type="checkbox" id="featured" name="featured" class="h-4 w-4 rounded border-gray-300 text-teal-600 shadow-sm focus:border-teal-300 focus:ring focus:ring-teal-200 focus:ring-opacity-50 focus:ring-offset-0 disabled:cursor-not-allowed disabled:text-gray-400" />
    <label for="featured" class="flex w-full space-x-2 text-sm"> Featured </label>
  </div>
  <div class="flex gap-4 mb-8">
      <input type="text" name="url" class="mt-1 block w-1/2 rounded-md border border-slate-300 bg-black px-3 py-4 placeholder-slate-400 shadow-sm placeholder:font-semibold placeholder:text-gray-500 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 sm:text-sm" placeholder="Job URL *" />
      <input type="text" name="tags" class="mt-1 block w-1/2 rounded-md border border-slate-300 bg-black px-3 py-4 placeholder-slate-400 shadow-sm placeholder:font-semibold placeholder:text-gray-500 focus:border-sky-500 focus:outline-none focus:ring-1 focus:ring-sky-500 sm:text-sm" placeholder="Job Tags *" />
    </div>
    <div class="text-center">
      <button type="submit" class="cursor-pointer rounded-lg bg-blue-700 px-8 py-5 text-sm font-semibold text-white">Book Appoinment</button>
    </div>
</form>
  </div>
</div>

</x-layout>