<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function index(){
        $students = student::all();
        return view('component.student_list',compact('students'));
    }
    public function create(){
        return view('create_student');
    }
    public function store(Request $request)
    {
        try {
            student::create([
                'reg_no'=>$request->reg_no,
                'name'=>$request->name,
                'email'=>$request->email,
                'phone'=>$request->Phoneno,
                'date_of_birth'=>$request->Birthday,
                'address'=>$request->Address,

            ]);
            return redirect()->route('student.list');

        }
        catch (\Exception $exception)
        {
            return $exception;
        }
    }
}
