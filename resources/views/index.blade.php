@extends('layouts.app')


@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">


            {{-- LOOP POSTS --}}
            @foreach ($posts as $post)
                <div class="card mb-4 shadow-sm border-0">


                    {{-- FOTO POST --}}
                    <img src="{{ $post->image_path }}" class="card-img-top" alt="Post Image">


                    <div class="card-body">
                        {{-- CAPTION --}}
                        <p class="card-text mb-3">
                            {{ $post->caption }}
                        </p>


                        {{-- ACTION ICONS --}}
                        <div class="d-flex align-items-center gap-3 mb-3">
                            {{-- LIKE --}}
                            @auth
                                <button class="btn p-0 border-0 bg-transparent">
                                    <i class="bi bi-heart fs-4"></i>
                                </button>
                            @else
                                <button class="btn p-0 border-0 bg-transparent" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Harus login">
                                    <i class="bi bi-heart fs-4 text-muted"></i>
                                </button>
                            @endauth


                            {{-- COMMENT TOGGLE --}}
                            <button class="btn p-0 border-0 bg-transparent" data-bs-toggle="collapse"
                                data-bs-target="#comments-{{ $loop->index }}">
                                <i class="bi bi-chat fs-4"></i>
                            </button>
                        </div>


                        {{-- COMMENT SECTION --}}
                        <div class="collapse" id="comments-{{ $loop->index }}">
                            <div class="mb-3">
                                @if ($post->comments->count() > 0)
                                    @foreach ($post->comments as $comment)
                                        <div class="mb-2">
                                            <strong>{{ $comment->user->name }}</strong>
                                            <div class="text-muted small">
                                                {{ $comment->content }}
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <p class="text-muted">Tidak ada komentar</p>
                                @endif
                            </div>


                            {{-- COMMENT FORM --}}
                            @auth
                                <form>
                                    <input type="text" class="form-control" placeholder="Tulis komentar...">
                                </form>
                            @else
                                <p class="text-muted fst-italic">
                                    Silahkan login untuk berkomentar
                                </p>
                            @endauth
                        </div>
                    </div>
                </div>
            @endforeach


        </div>
    </div>
@endsection
