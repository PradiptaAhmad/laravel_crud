<!-- resources/views/students/create.blade.php -->

@extends('layout.dashboard')

@section('container')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Tambah Data Siswa</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form method="post" action="{{ route('dashboard.students.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" class="form-control" id="Nama" name="Nama" required>
                            </div>

                            <div class="form-group">
                                <label for="nis">NIS</label>
                                <input type="text" class="form-control" id="NIS" name="NIS" required>
                            </div>

                            <div class="mb-3">
                                <label for="class" class="form-label">Kelas</label>
                                <select class="form-select" name="KelasId" id="KelasId" required>
                                    <option value="" selected disabled>Pilih</option>
                                    @foreach ($classes as $class)
                                        <option value="{{ $class->id }}">{{ $class->Nama_Kelas }}</option>
                                    @endforeach
                                </select>
                                
                            </div>

                            <div class="form-group">
                                <label for="address">Alamat</label>
                                <!-- Set a default value for the textarea using the value attribute -->
                                <textarea class="form-control" id="Alamat" name="Alamat" rows="3" required></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
