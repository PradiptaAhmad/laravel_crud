<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return view('student', [
            "title" => "Daftar Siswa",
            "students" => Student::all()
        ]);
    }

    public function delete(Student $student)
    {
        Student::destroy($student->id);
        return redirect('/students')->with('status', 'Data Siswa Berhasil Dihapus!');
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
            'Kelas' => 'required',
            'Alamat' => 'required'
        ]);

        Student::create($request->all());
        return redirect('/students')->with('status', 'Data Siswa Berhasil Ditambahkan!');
    }
    public function add()
    {
        return view('students.add', [
            "title" => "Tambah Data Siswa"
        ]);
    }
    public function edit(Student $student)
    {
        return view('students.edit', [
            'title' => 'Edit Data Siswa',
            'student' => $student,
        ]);
    }

    public function update(
        Request $request,
        Student $student
    ) {
        $request->validate([
            'Nama' => 'required',
            'NIS' => 'required',
            'Kelas' => 'required',
            'Alamat' => 'required'
        ]);

        Student::where('id', $student->id)
            ->update([
                'Nama' => $request->Nama,
                'NIS' => $request->NIS,
                'Kelas' => $request->Kelas,
                'Alamat' => $request->Alamat
            ]);
        return redirect('/students')->with('status', 'Data Siswa Berhasil Diubah!');
    }
}
