<!-- resources/views/students/edit.blade.php -->

@extends('layout.main')

@section('container')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Data Siswa</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form method="post" action="{{ route('students.update', ['student' => $student->id]) }}">
                            @csrf
                            @method('PATCH') <!-- Use PUT method for updates -->

                            <div class="form-group">
                                <label for="Nama">Nama</label>
                                <input type="text" class="form-control" id="Nama" name="Nama"
                                    value="{{ $student->Nama }}" required>
                            </div>

                            <div class="form-group">
                                <label for="NIS">NIS</label>
                                <input type="text" class="form-control" id="NIS" name="NIS"
                                    value="{{ $student->NIS }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="class" class="form-label">Kelas</label>
                                <select class="form-select" name="KelasId" id="KelasId" required>
                                    <option value="{{ $student->KelasId }}">{{$student->class->Nama_Kelas}}</option>
                                    @foreach ($classes as $class)
                                        <option value="{{ $class->id }}">{{ $class->Nama_Kelas }}</option>
                                    @endforeach
                                </select>

                            </div>

                            <div class="form-group">
                                <label for="Alamat">Alamat</label>
                                <textarea class="form-control" id="Alamat" name="Alamat" rows="3" required>{{ $student->Alamat }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary mt-4">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
