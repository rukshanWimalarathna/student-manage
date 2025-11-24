<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function() {return view('dashboard');})->name('dashboard');
Route::get('/register', function() {return view('student_register_form');})->name('student.register');
Route::get('/create',[StudentController::class,'create'])->name('student.create');
Route::get('/list',[StudentController::class,'index'])->name('student.list');

Route::post('/save',[StudentController::class,'store'])->name('student.store');

// Edit Form (Load existing data)
Route::get('/student/edit/{id}', [StudentController::class, 'edit'])->name('student.edit');

// Update Student
Route::post('/student/update/{id}', [StudentController::class, 'update'])->name('student.update');

// Delete Student
Route::delete('/student/delete/{id}', [StudentController::class, 'destroy'])->name('student.delete');
//Search Student
Route::get('/list',[StudentController::class,'index'])->name('student.list');


