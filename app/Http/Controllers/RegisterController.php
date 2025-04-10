<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Employer;

class RegisterController extends Controller
{

    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'employer' => ['required', 'string', 'max:255'],
            'logo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ]);
        

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);
        
        $logoURL = null;
        if ($request->hasFile('logo')) {
            $logoURL = $request->file('logo')->store('logos', 'public'); // 'public' bo'lmasa storage ko‘rsatmaydi
        }
        
        Employer::create([
            'user_id' => $user->id,
            'name' => $validated['employer'],
            'logo' => $logoURL,
        ]);
        
        Auth::login($user);
        
        return redirect('/');
    }

    public function register(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|confirmed|min:8',
        'employer' => 'nullable|string|max:255', // Kompaniya nomi
        'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Kompaniya logotipi
    ]);

    // Foydalanuvchi yaratish
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
    ]);

    // Kompaniya yaratish (agar mavjud bo'lsa)
    if ($request->hasFile('logo')) {
        $logoPath = $request->file('logo')->store('public/logos'); // logo faylini saqlash
        $employer = new Employer([
            'name' => $request->employer,
            'logo' => $logoPath,
        ]);
        $user->employer()->save($employer); // Employer bilan bog'lash
    } else {
        // Agar logotip yo'q bo'lsa, faqat kompaniya nomini saqlang
        $employer = new Employer([
            'name' => $request->employer,
        ]);
        $user->employer()->save($employer);
    }

    // Foydalanuvchini tizimga kiritish
    Auth::login();

    return redirect()->route('projects.index');
}

}        