@extends('layout.main')

@section('container')
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
                        <a href="{{ route('students.show', ['student' => $student->id]) }}" type="button"
                            class="btn btn-primary">Detail</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $students->withQueryString()->links('pagination::bootstrap-5') !!}
@endsection
