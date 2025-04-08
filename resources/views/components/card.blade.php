@props(['job'])

<div class="p-4 bg-white/15 rounded-xl flex flex-col text-center border border-transparent hover:border-blue-800 group" >
                        <div class="self-start text-sm">{{$job->employer->name}}</div>
                        <div class="py-8">
                            <h3 class="group-hover:text-blue-800 text-xl font-bold">{{$job->title}}</h3>
                            <p class="text-sm mt-4">{{$job->schedule}} - From {{$job->salary}}</p>
                        </div>
                        <div class="flex justify-between items-center mt-auto">
                            <div>
                                @foreach ($job->tags as $tag)
                                    <a href="/tags/{{$tag->name}}" class ="bg-white/10 px-3 hover:bg-white/25 rounded-xl text-sm transition-colors duration-300 text-align-center">{{$tag->name}}</a>
                                @endforeach
                            </div>
                            <img src="{{$job->employer->logo}}" width="60" alt="" class="rounded-xl">
                        </div>
                    </div>