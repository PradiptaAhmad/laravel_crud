@extends('layout.dashboard')

@section('container')
<h1>Ini AboutPage</h1>
<p>Nama :{{$nama}}</p>
<p>Kelas :{{$kelas}}</p>

<div class="row-md-6">
            <p>Photo :</p>
            <img src="{{ $photo }}" alt="User Photo" height="500" width="300">
        </div>

@endsection