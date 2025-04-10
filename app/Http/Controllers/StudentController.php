<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    // Studentlar ro'yxatini ko'rsatish
    public function index()
{
    $students = Student::all(); // Barcha studentlarni olish
    return view('students.index', compact('students'));
}

    // Foydalanuvchi profilini ko'rsatish
// StudentController.php
public function profile()
{
    $user = Auth::user();  // Foydalanuvchi ma'lumotlarini olish

    return view('students.profile', [
        'student' => $user,
        'employerName' => optional($user->employer)->name,
        'logoURL' => optional($user->employer)->logo,
    ]);
}

public function updateImage(Request $request)
{
    $user = Auth::user();

    $request->validate([
        'logo' => 'nullable|image|max:2048', // faqat rasm va maksimal 2MB
    ]);

    if ($request->hasFile('logo')) {
        $path = $request->file('logo')->store('logos', 'public');

        // eski rasmni o‘chirish (agar kerak bo‘lsa)
        if ($user->employer && $user->employer->logo) {
            Storage::disk('public')->delete($user->employer->logo);
        }

        // yangi rasmni saqlash
        $user->employer->logo = $path;
        $user->employer->save();
    }

    return redirect()->route('profile')->with('success', 'Profile image updated successfully!');
}

}
