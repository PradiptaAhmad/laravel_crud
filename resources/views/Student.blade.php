@extends('layout.main')

@section('container')
    <div class="mt-4">
        <a href="/students/add" class="btn btn-primary">Tambah</a>
    </div>
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
                        <a href="{{ route('students.show', ['student' => $student->id]) }}" type="button" class="btn btn-primary">Detail</a>
                        <a href={{ route('students.edit', ['student'=> $student->id]) }} type="button" class="btn btn-warning">Edit</a>
                        <!-- Modify the href attribute to use the student ID for the delete route -->
                        <a href="{{ route('students.delete', ['student' => $student->id]) }}" 
                           type="button" 
                           class="btn btn-danger"
                           onclick="confirmDelete('{{ $student->id }}')"
                        >
                            Delete
                        </a>
                        <!-- Hidden form to trigger the actual delete action -->
                        <form id="delete-form-{{ $student->id }}" action="{{ route('students.delete', ['student' => $student->id]) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
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
