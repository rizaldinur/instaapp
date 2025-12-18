@extends('layouts.app')


@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">


            {{-- LOOP POSTS --}}
            @forelse ($posts as $post)
                <div class="card mb-4 shadow-sm border-0">


                    {{-- FOTO POST --}}
                    <img src="{{ asset('storage/' . $post->image_path) }}" class="card-img-top" alt="Post Image">


                    <div class="card-body">
                        {{-- CAPTION --}}
                        <p class="card-text mb-3">
                            {{ $post->caption }}
                        </p>


                        {{-- ACTION ICONS --}}
                        <div class="d-flex align-items-center gap-3 mb-3">
                            {{-- LIKE --}}
                            @auth
                                <form action="{{ route('posts.like', $post->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button class="btn p-0 border-0 bg-transparent">
                                        <i
                                            class="bi fs-4
            {{ $post->isLikedByAuthUser() ? 'bi-heart-fill text-danger' : 'bi-heart' }}">
                                        </i>
                                        <span class="small">
                                            {{ $post->likes->count() }}
                                        </span>
                                    </button>
                                </form>
                            @else
                                <button class="btn p-0 border-0 bg-transparent" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Harus login">
                                    <i class="bi bi-heart fs-4 text-muted"></i>
                                    <span class="small">
                                        {{ $post->likes->count() }}
                                    </span>
                                </button>
                            @endauth


                            {{-- COMMENT TOGGLE --}}
                            <button class="btn p-0 border-0 bg-transparent" data-bs-toggle="collapse"
                                data-bs-target="#comments-{{ $loop->index }}">
                                <i class="bi bi-chat fs-4"></i>
                                <span class="small">
                                    {{ $post->comments->count() }}
                                </span>
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
                                                {{ $comment->body }}
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <p class="text-muted">Tidak ada komentar</p>
                                @endif
                            </div>


                            {{-- COMMENT FORM --}}
                            @auth
                                <form action="{{ route('posts.comments.store', $post->id) }}" method="POST">
                                    @csrf
                                    <div class="input-group mt-2">
                                        <input type="text" name="content" class="form-control"
                                            placeholder="Tulis komentar..." required>
                                        <button class="btn btn-primary">Kirim</button>
                                    </div>
                                </form>
                            @else
                                <p class="text-muted fst-italic">
                                    Silahkan login untuk berkomentar
                                </p>
                            @endauth
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center fst-italic text-muted">
                    Belum ada postingan.
                </p>
            @endforelse


        </div>
    </div>
@endsection
