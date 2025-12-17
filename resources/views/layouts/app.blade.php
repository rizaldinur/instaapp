<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'InstaApp') }}</title>


    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #4facfe, #00f2fe);
        }


        body {
            background-color: #f5f9ff;
        }


        .bg-primary-gradient {
            background: var(--primary-gradient);
        }


        .btn-login {
            background-color: rgba(255, 255, 255, 0.25);
            color: #fff;
            border: 1px solid rgba(255, 255, 255, 0.5);
        }


        .btn-login:hover {
            background-color: rgba(255, 255, 255, 0.4);
            color: #fff;
        }
    </style>
</head>

<body>
    <nav class="navbar bg-primary-gradient navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand fw-bold text-white" href="{{ url('/') }}">InstaApp</a>


            <div class="ms-auto">
                @guest
                    <a href="{{ route('login') }}" class="btn btn-login">Login</a>
                @endguest
            </div>
        </div>
    </nav>


    <main class="container py-5">
        @yield('content')
    </main>


</body>

</html>
