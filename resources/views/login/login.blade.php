@extends('layout.main')

@section('container')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mt-5">
                @if (session()->has('success') || session()->has('failed'))
                    <div>
                        <div class="alert alert-{{ session('success') ? 'success' : 'warning' }} alert-dismissible fade show"
                            role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <strong>{{ session('success') ? 'Success' : 'Warning' }}</strong> {{ session('failed') }}
                        </div>
                        <script>
                            var alertList = document.querySelectorAll(".alert");
                            alertList.forEach(function(alert) {
                                new bootstrap.Alert(alert);
                            });
                        </script>

                    </div>
                @endif
                <div class="card-header">
                    <h3 class="text-center">Login</h3>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('login.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                        </div>
                        <div class="form-group mt-2 mb-2">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="text-center">
                        <a href="{{ route('register.index')}}">Didn't have an account? Register Here</a>
                    </div>
                </div>
            </div>
        </div>
    @endsection
