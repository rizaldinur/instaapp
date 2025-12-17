@extends('layouts.app')


@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <h4 class="text-center mb-4 fw-bold">Login</h4>


                    <form method="POST">
                        @csrf


                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" required autofocus>
                        </div>


                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>


                        <button type="submit" class="btn w-100 text-white"
                            style="background: linear-gradient(135deg, #4facfe, #00f2fe);">
                            Login
                        </button>

                        <div class="mt-2"><a class="link-underline-primary" href="{{ route('register') }}"
                                class="text-decoration-none">Belum punya akun?
                                Daftar</a></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
