<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Student;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view(
            'dashboard.index'
        )->with('success', 'Berhasil Masuk Kedalam Dashboard');
    }

    public function about()
    {
        return view('dashboard.about', [
            "title" => "About",
            "nama" => "Ahmad Pradipta",
            "kelas" => "XI PPLG 2",
            "photo" => "img/adip.jpg"
        ]);
    }
    public function showStudents()
    {
        $studentsitem = Student::paginate(5);
        return view('dashboard.students.all', [
            "title" => "Daftar Siswa",
            "students" => $studentsitem,
        ]); // Redirect
    }
    public function showKelas()
    {
        $classesItem = Classes::paginate(4);
        return view('dashboard.kelas.kelas', [
            "title" => "Daftar Kelas",
            "classes" => $classesItem
        ]);
    }

    public function delete(Student $student)
    {
        Student::destroy($student->id);
        return redirect()->route('dashboard.students.all')->with('success', 'Data Siswa Berhasil Dihapus!');
    }

    public function store(Request $request)
    {
        // return view('student', [
        //     "title" => "Daftar Siswa",
        //     "students" => Student::all()
        // ]);
        $request->validate([
            'Nama' => 'required',
            'NIS' => 'required',
            'KelasId' => 'required',
            'Alamat' => 'required',
        ]);

        Student::create($request->all());
        return redirect()->route('dashboard.students.all')->with('success', 'Data Siswa Berhasil Ditambahkan!');
    }

    public function add()
    {
        return view('dashboard.students.add', [
            "title" => "Tambah Data Siswa",
            "classes" => Classes::all()
        ]);
    }
    public function edit(Student $student)
    {
        return view('dashboard.students.edit', [
            'title' => 'Edit Data Siswa',
            'student' => $student,
            "classes" => Classes::all()
        ]);
    }

    public function update(
        Request $request,
        Student $student
    ) {
        $request->validate([
            'Nama' => 'required',
            'NIS' => 'required',
            'KelasId' => 'required',
            'Alamat' => 'required'
        ]);

        Student::where('id', $student->id)
            ->update([
                'Nama' => $request->Nama,
                'NIS' => $request->NIS,
                'KelasId' => $request->KelasId,
                'Alamat' => $request->Alamat
            ]);
        return redirect()->route('dashboard.students.all')->with('success', 'Data Siswa Berhasil Diubah!');
    }
    public function show(Student $student)
    {
        return view('dashboard.students.detail', [
            'title' => 'Detail Siswa',
            'student' => $student,
        ]);
    }
}
