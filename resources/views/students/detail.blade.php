<!-- resources/views/students/show.blade.php -->

@extends('layout.main')

@section('container')
    <div class="card mt-4">
        <div class="card-body">
            <h5 class="card-title">{{ $student->Nama }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">NIS: {{ $student->NIS }}</h6>
            <p class="card-text">Alamat: {{ $student->Alamat }}</p>
            <p class="card-text">Kelas: {{ $student->Kelas }}</p>
            <!-- Add any other details you want to display -->
            <a href="{{ route('students.edit', ['student' => $student->id]) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('students.delete', ['student' => $student->id]) }}" 
               class="btn btn-danger"
               {{-- onclick="confirmDelete(event, '{{ $student->id }}')" --}}
            >
                Delete
            </a>
        </div>
    </div>
@endsection
