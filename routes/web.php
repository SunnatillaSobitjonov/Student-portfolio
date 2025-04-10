<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

// Bosh sahifa => projects sahifasiga redirect
Route::get('/', function () {
    return redirect('/projects');
});

// Static pages
Route::get('/about', fn() => view('about'));
Route::get('/contact', fn() => view('contact'));

// Job routes
Route::get('/jobs/create', [JobController::class, 'create']);
Route::post('/jobs/store', [JobController::class, 'store']);

// Search & Tags
Route::get('/search', SearchController::class);
Route::get('/tags/{tag:name}', TagController::class);

// Guest (ro‘yxatdan o‘tmagan foydalanuvchilar) routes
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);

    Route::get('/login', [LoginController::class, 'create']);
    Route::post('/login', [LoginController::class, 'store']);
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
    

});

// Auth (faqat login bo‘lgan foydalanuvchilar) routes
Route::middleware(['auth'])->group(function () {
    Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
    Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');
    Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::put('/projects/{project}', [ProjectController::class, 'update'])->name('projects.update');
    Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');
    Route::get('/profile', [StudentController::class, 'profile'])->name('profile');
    Route::delete('/logout', [LoginController::class, 'logout']);
    Route::put('/profile/image', [StudentController::class, 'updateImage'])->name('profile.updateImage')->middleware('auth');
    Route::post('/update-image', [StudentController::class, 'updateImage'])->name('updateImage');
});

// Public (hammaga ochiq) routes
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');

Route::get('/students', [StudentController::class, 'index'])->name('students.index');
