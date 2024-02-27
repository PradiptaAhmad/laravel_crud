<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classesItem = Classes::paginate(5);
        return view('kelas.kelas', [
            "title" => "Daftar Kelas",
            "classes" => $classesItem
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function add()
    {
        return view('Kelas.add_kelas', [
            "title" => "Tambah Data Kelas"
        ]);
    }
    public function added(Request $request)
    {
        $request->validate([
            'Nama_Kelas' => 'required'
        ]);

        Classes::create($request->all());
        return redirect('/student')->with('status', 'Data Kelas Berhasil Ditambahkan!');
    }
}
