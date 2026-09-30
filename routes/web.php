<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $role = auth()->user()->role ?? 'student';

    if ($role === 'teacher') {
        return redirect()->route('teacher.dashboard');
    }

    return redirect()->route('student.dashboard');
})->middleware(['auth'])->name('dashboard');

// Teacher Dashboard — left sidebar + posted lessons + grading/messages widgets
Route::get('/teacher/dashboard', function () {
    return view('teacher-dashboard');
})->middleware(['auth', 'teacher'])->name('teacher.dashboard');

// Student Dashboard
Route::get('/student/dashboard', function () {
    return view('student-dashboard');
})->middleware(['auth', 'student'])->name('student.dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
