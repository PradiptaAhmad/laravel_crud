@extends('layout.main')

    @section('container')
        <h3>Create Kelas</h3>
        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

        <form action="{{ route('classes.add.store') }}" method="post">
            @csrf

            <div class="mb-3">
                <label for="nama" class="form-label">Nama Kelas</label>
                <input type="text" class="form-control" id="Nama_Kelas" name="Nama_Kelas" required value="">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>

            <a href="{{ route('classes.add') }}" class="btn btn-secondary">Kembali</a>
        </form>
    @endsection