<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class add_controller extends Controller
{
    public function showForm()
    {
        return view('add');
    }

    public function saveForm(Request $request)
    {
        // Validasi input formulir di sini jika diperlukan

       Student::create([
            'nis' => $request->nis,
            'name' => $request->name,
            'kelas' => $request->kelas,
            'alamat' => $request->alamat
        ]);

        return redirect()->back()->with('success', 'Formulir berhasil disimpan');
    }
}
