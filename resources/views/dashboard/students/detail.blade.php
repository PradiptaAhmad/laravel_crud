<!-- resources/views/students/show.blade.php -->

@extends('layout.dashboard')

@section('container')
    <div class="card mt-4">
        <div class="card-body">
            <h5 class="card-title">{{ $student->Nama }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">NIS: {{ $student->NIS }}</h6>
            <p class="card-text">Alamat: {{ $student->Alamat }}</p>
            <p class="card-text">Kelas: {{ $student->class->Nama_Kelas }}</p>
            <!-- Add any other details you want to display -->
            <a href="{{ route('dashboard.students.edit', ['student' => $student->id]) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('dashboard.students.delete', ['student' => $student->id]) }}" type="button" class="btn btn-danger"
                onclick="confirmDelete('{{ $student->id }}')">
                Delete
            </a>
            <form id="delete-form-{{ $student->id }}" action="{{ route('dashboard.students.delete', ['student' => $student->id]) }}"
                method="POST" style="display: none;">
                @csrf
                @method('DELETE')
            </form>
        </div>
    </div>
    <script>
        function confirmDelete(studentId) {
            var result = confirm("Are you sure you want to delete this student?");
            if (result) {
                // User clicked "OK," proceed with the delete action
                event.preventDefault();
                document.getElementById('delete-form-' + studentId).submit();
            } else {
                event.preventDefault();
            }
        }
    </script>
@endsection
