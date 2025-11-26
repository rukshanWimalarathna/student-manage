<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Redirect based on user role
        $user = Auth::user();

        return match($user->role) {
            'admin' => redirect()->route('admin.dashboard'),
            'teacher' => redirect()->route('teacher.dashboard'),
            'student' => redirect()->route('student.dashboard'),
            default => redirect('/login')
        };
    }

    public function adminDashboard()
    {
        // Admin dashboard data
        $studentCount = Student::count();
        $teacherCount = Teacher::count();
        $userCount = User::count();

        return view('dashboard.admin', compact('studentCount', 'teacherCount', 'userCount'));
    }

    public function teacherDashboard()
    {
        // Teacher dashboard data
        $teacher = Auth::user();

        return view('dashboard.teacher', compact('teacher'));
    }

    public function studentDashboard()
    {
        // Student dashboard data
        $student = Auth::user();

        return view('dashboard.student', compact('student'));
    }
}
