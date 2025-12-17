@extends('layouts.app')


@section('content')
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-5">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <h4 class="text-center mb-4 fw-bold">Register</h4>


                    <form method="POST" action="{{ route('register') }}">
                        @csrf


                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>


                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>


                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>


                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>


                        <div class="mb-4">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control" required>
                        </div>


                        <button type="submit" class="btn w-100 text-white"
                            style="background: linear-gradient(135deg, #4facfe, #00f2fe);">
                            Register
                        </button>
                    </form>


                    <div class="text-center mt-3">
                        <small>
                            Sudah punya akun?
                            <a href="{{ route('login') }}">Login</a>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
