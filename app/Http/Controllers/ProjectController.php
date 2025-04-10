<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    // Barcha loyihalarni chiqarish


    // public function show(Project $project)
    // {
    //     // Portfolioni ko'rsatish uchun viewga yuborish
    //     return view('projects.show', compact('project'));
    // }


    // // Yangi loyiha yaratish formasi
    // public function create()
    // {
    //     return view('projects.create');
    // }

    // Loyiha saqlash

    public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'link' => 'nullable|url',
        'name' => 'nullable|string|max:255',
        'email' => 'nullable|email|max:255',
        'gender' => 'nullable|string|in:male,female,other',
        'technologies' => 'nullable|array',
        'technologies.*' => 'string',
        'experience' => 'nullable|string|in:beginner,intermediate,advanced',
        'feedback' => 'nullable|string|max:1000',
    ]);

    // user_id ni ham qo'shamiz
    $validated['user_id'] = Auth::id(); // yoki Auth::id()

    // Create project with validated data
    Project::create($validated);


        return view('projects.create');  // create.blade.php faylini qaytaradi
    
}

public function create()
{
    return view('projects.create');  // create.blade.php faylini qaytaradi
}




    // public function edit(Project $project)
    // {
    //     // Foydalanuvchining portfoliosi faqat o'zi tahrir qilishi mumkin
    //     if (Auth::user()->id !== $project->user_id) {
    //         abort(403);
    //     }

    //     return view('projects.edit', compact('project'));
    // }

    // // Portfolioni yangilash
    // public function update(Request $request, Project $project)
    // {
    //     // Foydalanuvchining portfoliosi faqat o'zi tahrir qilishi mumkin
    //     if (Auth::user()->id !== $project->user_id) {
    //         abort(403);
    //     }

    //     // Requestni validatsiya qilish
    //     $validated = $request->validate([
    //         'title' => 'required|max:255',
    //         'description' => 'required',
    //     ]);

    //     // Portfolioni yangilash
    //     $project->update($validated);

    //     return redirect()->route('profile')->with('success', 'Portfolio updated successfully!');
    // }

    // Portfolioni o'chirish
    public function destroy(Project $project)
    {
        // Foydalanuvchining portfoliosi faqat o'zi o'chirishi mumkin
        if (Auth::user()->id !== $project->user_id) {
            abort(403);
        }

        // Portfolioni o'chirish
        $project->delete();

        return redirect()->route('profile')->with('success', 'Portfolio deleted successfully!');
    }


    public function show($id)
{
    $project = Project::findOrFail($id);
    return view('projects.show', compact('project'));
}

public function edit($id)
{
    $project = Project::findOrFail($id);
    return view('projects.edit', compact('project'));
}

public function update(Request $request, $id)
{
    $project = Project::findOrFail($id);

    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'link' => 'nullable|url',
        'name' => 'nullable|string|max:255',
        'email' => 'nullable|email',
        'gender' => 'nullable|in:male,female,other',
        'technologies' => 'nullable|array',
        'technologies.*' => 'string',
        'experience' => 'nullable|in:beginner,intermediate,advanced',
        'feedback' => 'nullable|string',
    ]);

    // Use only validated data
    $project->update($request->validated());

    return redirect()->route('projects.show', $project->id);
}



public function index(Request $request)
{
    $search = $request->input('search');

    // Barcha loyihalarni ko'rsatish
    $projects = Project::query()
        ->where(function ($q) use ($search) {
            $q->where('title', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%');
        })
        ->latest()
        ->paginate(6)
        ->appends(['search' => $search]);

    return view('projects.index', compact('projects', 'search'));
}


}
