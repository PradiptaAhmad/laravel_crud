<!-- resources/views/students/show.blade.php -->

@extends('layout.main')

@section('container')
    <div class="card mt-4">
        <div class="card-body">
            <h5 class="card-title">{{ $student->Nama }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">NIS: {{ $student->NIS }}</h6>
            <p class="card-text">Alamat: {{ $student->Alamat }}</p>
            <p class="card-text">Kelas: {{ $student->class->Nama_Kelas }}</p>
            <!-- Add any other details you want to display -->
        </div>
    </div>
@endsection
