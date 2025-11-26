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
use App\Models\Student;
use App\Models\Teacher;



Route::get('/', function() {
    // Basic counts
    $studentCount = Student::count();
    $teacherCount = Teacher::count();
    $totalUsers = $studentCount + $teacherCount;

    // Student Age Distribution Calculation
    $students = Student::all();
    $ageUnder18 = 0;
    $age18to25 = 0;
    $age26to35 = 0;
    $ageOver35 = 0;

    foreach ($students as $student) {
        $age = \Carbon\Carbon::parse($student->date_of_birth)->age;

        if ($age < 18) {
            $ageUnder18++;
        } elseif ($age >= 18 && $age <= 25) {
            $age18to25++;
        } elseif ($age >= 26 && $age <= 35) {
            $age26to35++;
        } else {
            $ageOver35++;
        }
    }

    // Teacher Subject Distribution Calculation
    $teachers = Teacher::all();
    $subjectCounts = [];

    foreach ($teachers as $teacher) {
        $subject = $teacher->subject ?: 'Other';
        if (!isset($subjectCounts[$subject])) {
            $subjectCounts[$subject] = 0;
        }
        $subjectCounts[$subject]++;
    }

    // Get top 4 subjects + Others
    arsort($subjectCounts);
    $topSubjects = array_slice($subjectCounts, 0, 4, true);
    $otherCount = $teacherCount - array_sum($topSubjects);

    return view('dashboard', compact(
        'studentCount', 'teacherCount', 'totalUsers',
        'ageUnder18', 'age18to25', 'age26to35', 'ageOver35',
        'topSubjects', 'otherCount'
    ));
})->name('dashboard');


// Student Routes
Route::get('/register', function() {return view('student_register_form');})->name('student.register');

Route::get('/create', [StudentController::class, 'create'])->name('student.create');
Route::get('/list', [StudentController::class, 'index'])->name('student.list');
Route::post('/save', [StudentController::class, 'store'])->name('student.store');
Route::get('/student/edit/{id}', [StudentController::class, 'edit'])->name('student.edit');
Route::post('/student/update/{id}', [StudentController::class, 'update'])->name('student.update');
Route::delete('/student/delete/{id}', [StudentController::class, 'destroy'])->name('student.delete');

// Teacher Routes
Route::get('/teacher/register', function() {return view('teacher_register_form');})->name('teacher.register');

Route::get('/teacher/create', [TeacherController::class, 'create'])->name('teacher.create');
Route::get('/teacher/list', [TeacherController::class, 'index'])->name('teacher.list');
Route::post('/teacher/save', [TeacherController::class, 'store'])->name('teacher.store');
Route::get('/teacher/edit/{id}', [TeacherController::class, 'edit'])->name('teacher.edit');
Route::post('/teacher/update/{id}', [TeacherController::class, 'update'])->name('teacher.update');
Route::delete('/teacher/delete/{id}', [TeacherController::class, 'destroy'])->name('teacher.delete');
