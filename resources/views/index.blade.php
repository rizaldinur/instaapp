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
                            <button class="btn p-0 border-0 bg-transparent">
                                <i class="bi bi-heart fs-4"></i>
                            </button>


                            {{-- COMMENT --}}
                            <button class="btn p-0 border-0 bg-transparent">
                                <i class="bi bi-chat fs-4"></i>
                            </button>
                        </div>


                        {{-- COMMENT FORM (DISABLED FOR NOW) --}}
                        @auth
                            <form>
                                <input type="text" class="form-control" placeholder="Tulis komentar..." disabled>
                            </form>
                        @endauth
                    </div>
                </div>
            @endforeach


        </div>
    </div>
@endsection
