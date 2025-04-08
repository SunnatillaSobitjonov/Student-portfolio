@props(['job'])

<div class="p-4 bg-white/15 rounded-xl flex gap-6 border hover:border-blue-800 group transition-colors duration-1000">
                        <div>
                            <img src="/storage/{{$job->employer->logo}}" alt="" width="60" class="rounded-xl">
                        </div>

                        <div class="flex-1 flex flex-col">
                            <a class="self-start text-sm text-gray-400">{{$job->employer->name}}</a>

                            <h3 class="text-xl font-bold mt-3 group-hover:text-blue-800">{{$job->title}}</h3>
                            <p class="text-sm text-gray-400 mt-auto">{{$job->schedule}} - From {{$job->salary}}</p>
                        </div>

                        <div>
                            @foreach ($job->tags as $tag)
                                <a href="/tags/{{$tag->name}}" class ="bg-white/10 px-3 hover:bg-white/25 rounded-xl text-2xs font-bold transition-colors duration-300">{{$tag->name}}</a>
                            @endforeach
                        </div>
                    </div>