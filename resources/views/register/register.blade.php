@extends('layout.main')

@section('container')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mt-5">
                <div class="card-header">
                    <h3 class="text-center">Register</h3>
                </div>
                <div class="card-body">

                    <form method="POST" action="{{ route('register.store') }}">
                        @csrf
                        <div class="form-group mt-2">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required>
                        </div>
                        <div class="form-group  mt-2">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
                        </div>
                        <div class="form-group  mt-2">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                        </div>
                        <div class="form-group mt-2 mb-2">
                            <label for="confirm-password">Confirm Password</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password"
                                placeholder="Confirm password" required>
                        </div>
                        @if (session()->has('failed'))
                            <div>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                    <strong>Warning</strong> {{
                                        session('failed');
                                    }}
                                </div>

                                <script>
                                    var alertList = document.querySelectorAll(".alert");
                                    alertList.forEach(function(alert) {
                                        new bootstrap.Alert(alert);
                                    });
                                </script>

                            </div>
                        @endif
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="text-center">
                        <a href="{{ route('login.index')}}">Already have an account? Login here.</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
