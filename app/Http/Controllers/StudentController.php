<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $students = Student::all();

        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $attributes = $this->validateStudent();

        Student::create($attributes);

        return redirect('students');
    }

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $student->update($this->validateStudent());

        return redirect('students');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        return redirect('students');
    }

    protected function validateStudent()
    {
        return request()->validate([
            'name' => 'required',
            'last_name' => 'required',
            'email' => ['nullable', 'email'],
            'phone_number' => 'nullable',
            'account_number' => 'nullable'
        ]);
    }
}
