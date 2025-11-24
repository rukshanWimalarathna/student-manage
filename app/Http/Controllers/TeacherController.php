<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $teachers = Teacher::when($search, function ($query, $search) {
            return $query->where('teacher_id', 'LIKE', "%{$search}%")
                ->orWhere('name', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%")
                ->orWhere('phone', 'LIKE', "%{$search}%")
                ->orWhere('subject', 'LIKE', "%{$search}%")
                ->orWhere('nic_no', 'LIKE', "%{$search}%")
                ->orWhere('address', 'LIKE', "%{$search}%");
        })->get();

        return view('component.teacher_list', compact('teachers'));
    }

    public function create()
    {
        $teacher = null;
        return view('teacher_register_form', compact('teacher'));
    }

    public function store(Request $request)
    {
        // REMOVE THIS LINE:
        // dd($request->all());

        try {
            $validated = $request->validate([
                'teacher_id' => 'required|unique:teachers,teacher_id',
                'name' => 'required',
                'email' => 'required|email|unique:teachers,email',
                'phone' => 'required|unique:teachers,phone',
                'subject' => 'required',
                'address' => 'required',
                'gender' => 'required|in:Male,Female,Other',
                'nic_no' => 'required|unique:teachers,nic_no'
            ]);

            Teacher::create([
                'teacher_id' => $request->teacher_id,
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'subject' => $request->subject,
                'address' => $request->address,
                'gender' => $request->gender,
                'nic_no' => $request->nic_no
            ]);

            return redirect()->route('teacher.list')
                ->with('success', 'Teacher registered successfully!');
        } catch (\Exception $exception) {
            return redirect()->back()
                ->with('error', 'Error creating teacher: ' . $exception->getMessage())
                ->withInput();
        }
    }

    public function edit($id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('teacher_register_form', compact('teacher'));
    }

    public function update(Request $request, $id)
    {
        try {
            $teacher = Teacher::findOrFail($id);

            $validated = $request->validate([
                'teacher_id' => 'required|unique:teachers,teacher_id,' . $id,
                'name' => 'required',
                'email' => 'required|email|unique:teachers,email,' . $id,
                'phone' => 'required|unique:teachers,phone,' . $id,
                'subject' => 'required',
                'address' => 'required',
                'gender' => 'required|in:Male,Female,Other',
                'nic_no' => 'required|unique:teachers,nic_no,' . $id
            ]);

            $teacher->update([
                'teacher_id' => $request->teacher_id,
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'subject' => $request->subject,
                'address' => $request->address,
                'gender' => $request->gender,
                'nic_no' => $request->nic_no
            ]);

            return redirect()->route('teacher.list')
                ->with('success', 'Teacher updated successfully!');
        } catch (\Exception $exception) {
            return redirect()->back()
                ->with('error', 'Error updating teacher: ' . $exception->getMessage())
                ->withInput();
        }
    }

    public function destroy($id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();

        return redirect()->route('teacher.list')->with('success', 'Teacher deleted successfully!');
    }
}
