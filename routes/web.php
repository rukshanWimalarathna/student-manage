<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Authentication Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Public Routes
Route::get('/', function () {
    return redirect('/login');
});

// Protected Routes - Require Authentication
Route::middleware(['auth'])->group(function () {

    // Role-based Dashboard Routes
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/admin/dashboard', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard')->middleware('admin');
    Route::get('/teacher/dashboard', [DashboardController::class, 'teacherDashboard'])->name('teacher.dashboard')->middleware('teacher');
    Route::get('/student/dashboard', [DashboardController::class, 'studentDashboard'])->name('student.dashboard')->middleware('student');

    // Admin-only Routes
    Route::middleware(['admin'])->group(function () {
        // Student Routes
        Route::get('/student/register', function() {
            return view('student_register_form');
        })->name('student.register');

        Route::get('/student/list', [StudentController::class, 'index'])->name('student.list');
        Route::post('/student/save', [StudentController::class, 'store'])->name('student.store');
        Route::get('/student/edit/{id}', [StudentController::class, 'edit'])->name('student.edit');
        Route::post('/student/update/{id}', [StudentController::class, 'update'])->name('student.update');
        Route::delete('/student/delete/{id}', [StudentController::class, 'destroy'])->name('student.delete');

        // Teacher Routes
        Route::get('/teacher/register', function() {
            return view('teacher_register_form');
        })->name('teacher.register');

        Route::get('/teacher/list', [TeacherController::class, 'index'])->name('teacher.list');
        Route::post('/teacher/save', [TeacherController::class, 'store'])->name('teacher.store');
        Route::get('/teacher/edit/{id}', [TeacherController::class, 'edit'])->name('teacher.edit');
        Route::post('/teacher/update/{id}', [TeacherController::class, 'update'])->name('teacher.update');
        Route::delete('/teacher/delete/{id}', [TeacherController::class, 'destroy'])->name('teacher.delete');
    });

    // Teacher-only Routes
    Route::middleware(['teacher'])->group(function () {
        // Teacher specific routes will be added later
    });

    // Student-only Routes
    Route::middleware(['student'])->group(function () {
        // Student specific routes will be added later
    });
});
