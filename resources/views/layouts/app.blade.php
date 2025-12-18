<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'InstaApp') }}</title>


    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

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
            <a class="navbar-brand text-white fw-bold" href="{{ url('/') }}">InstaApp</a>


            <div class="ms-auto d-flex align-items-center gap-3">
                @guest
                    <a href="{{ route('login') }}" class="btn btn-outline-light">Login</a>
                @endguest


                @auth
                    <!-- Create Post -->
                    <button class="btn text-white" data-bs-toggle="modal" data-bs-target="#createPostModal">
                        <i class="bi bi-plus-square fs-4"></i>
                    </button>


                    <!-- My Posts -->
                    <a href="#" class="text-white" title="My Posts">
                        <i class="bi bi-grid fs-4"></i>
                    </a>


                    <!-- Logout -->
                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                        @csrf
                        <button type="submit" class="btn p-0 text-white" title="Logout">
                            <i class="bi bi-box-arrow-right fs-4"></i>
                        </button>
                    </form>
                @endauth
            </div>
        </div>
    </nav>

    <main class="container py-5">
        @yield('content')
        @auth
            <div class="modal fade" id="createPostModal" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">


                        <div class="modal-header">
                            <h5 class="modal-title">Buat Post</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>


                        <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                            @csrf


                            <div class="modal-body">


                                {{-- Upload Gambar --}}
                                <div class="mb-3">
                                    <label class="form-label">Gambar</label>
                                    <input type="file" name="image" class="form-control" accept="image/*" required>
                                </div>


                                {{-- Caption --}}
                                <div class="mb-3">
                                    <label class="form-label">Caption</label>
                                    <textarea name="caption" class="form-control" rows="3" placeholder="Tulis caption..." required></textarea>
                                </div>


                            </div>


                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                    Batal
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    Kirim
                                </button>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        @endauth
    </main>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tooltipTriggerList = [].slice.call(
                document.querySelectorAll('[data-bs-toggle="tooltip"]')
            )
            tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
