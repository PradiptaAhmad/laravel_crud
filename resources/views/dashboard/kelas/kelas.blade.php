@extends('layout.dashboard')

@section('container')
    <h3>List Kelas</h3>
    <div class="mt-4">
        <a href="{{ route('dashboard.index') }}" class="btn btn-primary">Tambah</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Kelas</th>
            </tr>
        </thead>
        @php
            $no = 1;
        @endphp

        @foreach ($classes as $class)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $class->Nama_Kelas }}</td>
            </tr>
        @endforeach
    </table>
    </thead>
    {!! $classes->withQueryString()->links('pagination::bootstrap-5') !!}
@endsection
