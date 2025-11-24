<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $students = Student::when($search, function ($query, $search) {
            return $query->where('reg_no', 'LIKE', "%{$search}%")
                ->orWhere('name', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%")
                ->orWhere('phone', 'LIKE', "%{$search}%")
                ->orWhere('date_of_birth', 'LIKE', "%{$search}%")
                ->orWhere('address', 'LIKE', "%{$search}%");
        })->get();

        return view('component.student_list', compact('students'));
    }
    public function create(){
        // Pass null for $student so the form works for Add
        $student = null;
        return view('create_student', compact('student'));
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'reg_no' => 'required|unique:students,reg_no',
                'name' => 'required|unique:students,name',
                'email' => 'required|email|unique:students,email',
                'phone' => 'required|unique:students,phone',
                'date_of_birth' => 'required|date',
                'address' => 'required'
            ]);

            Student::create([
                'reg_no' => $request->reg_no,
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'date_of_birth' => $request->date_of_birth,
                'address' => $request->address,
            ]);

            return redirect()->route('student.list')
                ->with('success','New student added successfully!');
        }
        catch (\Exception $exception) {
            return redirect()->back()
                ->with('error', 'Error creating student: ' . $exception->getMessage())
                ->withInput();
        }
    }

    public function edit($id){
        $student = Student::findOrFail($id);
        return view('create_student', compact('student'));
    }


    public function update(Request $request, $id)
    {
        try {
            $student = Student::findOrFail($id);

            $validated = $request->validate([
                'reg_no' => 'required|unique:students,reg_no,' . $id,
                'name' => 'required|unique:students,name,' . $id,
                'email' => 'required|email|unique:students,email,' . $id,
                'phone' => 'required|unique:students,phone,' . $id,
                'date_of_birth' => 'required|date',
                'address' => 'required'
            ]);

            $student->update([
                'reg_no' => $request->reg_no,
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'date_of_birth' => $request->date_of_birth,
                'address' => $request->address,
            ]);

            return redirect()->route('student.list')
                ->with('success','Student updated successfully!');
        }
        catch (\Exception $exception) {
            return redirect()->back()
                ->with('error', 'Error updating student: ' . $exception->getMessage())
                ->withInput();
        }
    }
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('student.list')->with('success', 'Student deleted successfully!');
    }

}
