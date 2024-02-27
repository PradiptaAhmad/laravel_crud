<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function index(Request $request, $guard = null)
    {
        $studentsitem = Student::paginate(3);
        return view('students.all', [
            "title" => "Daftar Siswa",
            "students" => $studentsitem,
        ]);
    }
    public function show(Student $student)
    {
        return view('students.detail', [
            'title' => 'Detail Siswa',
            'student' => $student,
        ]);
    }
}
