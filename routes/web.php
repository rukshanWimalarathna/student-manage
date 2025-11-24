<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Dashboard
Route::get('/', function() {
    return view('dashboard');
})->name('dashboard');

// Student Routes
Route::get('/register', function() {
    return view('student_register_form');
})->name('student.register');

Route::get('/create', [StudentController::class, 'create'])->name('student.create');
Route::get('/list', [StudentController::class, 'index'])->name('student.list');
Route::post('/save', [StudentController::class, 'store'])->name('student.store');
Route::get('/student/edit/{id}', [StudentController::class, 'edit'])->name('student.edit');
Route::post('/student/update/{id}', [StudentController::class, 'update'])->name('student.update');
Route::delete('/student/delete/{id}', [StudentController::class, 'destroy'])->name('student.delete');

// Teacher Routes
Route::get('/teacher/register', function() {
    return view('teacher_register_form');
})->name('teacher.register');

Route::get('/teacher/create', [TeacherController::class, 'create'])->name('teacher.create');
Route::get('/teacher/list', [TeacherController::class, 'index'])->name('teacher.list');
Route::post('/teacher/save', [TeacherController::class, 'store'])->name('teacher.store');
Route::get('/teacher/edit/{id}', [TeacherController::class, 'edit'])->name('teacher.edit');
Route::post('/teacher/update/{id}', [TeacherController::class, 'update'])->name('teacher.update');
Route::delete('/teacher/delete/{id}', [TeacherController::class, 'destroy'])->name('teacher.delete');
