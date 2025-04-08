<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        $search = $request->input('search');
        $jobs = Job::with(['employer', 'tags'])->where('title', 'LIKE', "%{$search}%")->get();

        return view('jobs.results', ['jobs' => $jobs]);
    }
}
