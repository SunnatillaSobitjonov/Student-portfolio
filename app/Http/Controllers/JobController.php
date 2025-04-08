<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::all()->groupBy('featured');
        $tags = Tag::all();
        return view('jobs.index', [
            'jobs' => $jobs[0],
            'tags' => $tags,
            'featuredJobs' => $jobs[1],
        ]);
        // return view('job.index', compact('job'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = request()->validate([
        'title' => ['required'],
        'salary' => ['required'],
        'location' => ['required'],
        'url' => ['required'],
        'schedule' => ['required' , Rule::in(["Part time", "Full time"])],
        'tags' => ['nullable'],
        ]);

        $attributes['featured'] = $request->has('featured');

        $job = Job::create([
            'title' => $attributes['title'],
            'salary' => $attributes['salary'],
            'location' => $attributes['location'],
            'url' => $attributes['url'],
            'schedule' => $attributes['schedule'],
            'featured' => $attributes['featured'],
            'employer_id' => Auth::user()->employer->id,
        ]);


        if ($attributes['tags']) {
            foreach (explode(',', $attributes['tags']) as $tag) {
                $job->tag($tag);
            }
        }

            return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobRequest $request, Job $job)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        //
    }
}
