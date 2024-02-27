@extends('layout.dashboard')

@section('container')
    <div class="mt-4">
        @if (session()->has('success') || session()->has('failed'))
            <div class="mt-4 mb-4">
                <div class="alert alert-{{ session('success') ? 'success' : 'warning' }} alert-dismissible fade show"
                    role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong>{{ session('success') ? 'Success' : 'Warning' }}</strong> {{ session('success') }}
                </div>
                <script>
                    var alertList = document.querySelectorAll(".alert");
                    alertList.forEach(function(alert) {
                        new bootstrap.Alert(alert);
                    });
                </script>

            </div>
    </div>
    @endif
    <a href="{{ route('dashboard.students.add') }}" class="btn btn-primary">Tambah</a>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">NIS</th>
                <th scope="col">Nama</th>
                <th scope="col">Alamat</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student['NIS'] }}</td>
                    <td>{{ $student['Nama'] }}</td>
                    <td>{{ $student['Alamat'] }}</td>
                    <td>
                        <a href="{{ route('dashboard.students.show', ['student' => $student->id]) }}" type="button"
                            class="btn btn-primary">Detail</a>
                        <a href={{ route('dashboard.students.edit', ['student' => $student->id]) }} type="button"
                            class="btn btn-warning">Edit</a>
                        <!-- Modify the href attribute to use the student ID for the delete route -->
                        <a href="{{ route('dashboard.students.delete', ['student' => $student->id]) }}" type="button"
                            class="btn btn-danger" onclick="confirmDelete('{{ $student->id }}')">
                            Delete
                        </a>
                        <!-- Hidden form to trigger the actual delete action -->
                        <form id="delete-form-{{ $student->id }}"
                            action="{{ route('dashboard.students.delete', ['student' => $student->id]) }}" method="POST"
                            style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>
    {!! $students->withQueryString()->links('pagination::bootstrap-5') !!}

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
