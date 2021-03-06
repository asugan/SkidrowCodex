@extends('layout.main')
@section('title', $posts->post_name)
@section('description', Str::limit($posts->seo_description, 120, '...'))
@section('keywords', $posts->keywords)
@section('content')
    @if (session()->has('message'))
        <div class=" col-12 alert alert-success text-center">
            {{ session()->get('message') }}
        </div>
    @endif
    <div class="container text-white">
        <div class="row">
            <div class="pt-3 pb-5">
                <div class="col-12">
                    <a href="{{ route('postname', ['post' => $posts->slug]) }}" class="text-decoration-none text-white">
                        <h1 class="text-center mb-3">{{ $posts->post_name }}</h1>
                        <div class="d-flex justify-content-center align-items-center pb-3">
                            <a href="{{ url('category', ['category' => $posts->category_name]) }}"
                                class="text-decoration-none categoryhover">
                                <div class="ps-4 pe-4 pt-2 pb-2">
                                    <h4 class="mt-auto mb-auto">{{ $posts->category_name }}</h4>
                                </div>
                            </a>
                        </div>
                    </a>
                    <div class="d-flex justify-content-center mt-3">
                        <img src="{{ url('storage/' . $posts->image1) }}" alt="{{ $posts->post_name }}" class="postimg">
                    </div>
                </div>
                <div class="offset-1 col-10 offset-1 mt-3">
                    <h2>Game Details:</h2>
                    <h4>Title: <span class="postspan">{{ $posts->post_name }}</span></h4>
                    <h4>Genre: <span class="postspan">{{ $posts->category_name }}</span></h4>
                    <h4>Size: <span class="postspan">{{ $posts->size }}</span></h4>
                    <h4>DLC: <span class="postspan">{{ $posts->dlcs }}</span></h4>
                    <h4>Developer: <span class="postspan">{{ $posts->developer }}</span></h4>
                    <h4>Release Year: <span class="postspan">{{ $posts->release_year }}</span></h4>
                    <h4>Steam Link: <a href="{{ $posts->steam_link }}" target="_blank"><input type="text"
                                placeholder="Go to Steam Link" class="bg-white inputc ms-3"></a>
                    </h4>
                    <h4>Game Version: <span class="postspan">{{ $posts->game_version }}</span></h4>
                    <h4>Keywords: <span class="postspan">{{ $posts->keywords }}</span></h4>
                </div>
                <div class="offset-1 col-10 offset-1 mt-3">
                    <h2>Description:</h2>
                    <p>{{ $posts->seo_description }}</p>
                </div>
                <div class="offset-1 col-10 offset-1 mt-3">
                    <h2>About The Game:</h2>
                    <p>{{ $posts->post_body }}</p>
                </div>
                <div class="col-12 text-center">
                    <h3>Torrent Links :</h3>
                    <h4 class="mt-3"><a href="{{ $posts->t_link }}" target="_blank"><input type="text"
                                placeholder="Click For Torrent Link -1" class="bg-white inputc"></a>
                    </h4>
                </div>
                @if ($posts->image2 and $posts->image3)
                    <div class="col-12 text-center mt-4">
                        <h3>Screenshoots :</h3>
                        <img src="{{ url('storage/' . $posts->image2) }}" alt="{{ $posts->post_name }}"
                            class="scsimg img-fluid mt-4">
                        <img src="{{ url('storage/' . $posts->image3) }}" alt="{{ $posts->post_name }}"
                            class="scsimg img-fluid mt-5">
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="be-comment-block">
            <h1 class="text-center text-white">Comments ({{ count($comment) }})</h1>
            @foreach ($comment as $comments)
                <div class="be-comment">
                    <div class="be-img-comment">
                        <img src="https://i.hizliresim.com/a4ixwzo.webp" alt="" class="be-ava-comment">
                    </div>

                    <div class="be-comment-content">
                        <span class="be-comment-name">
                            <a class="text-white text-decoration-none">{{ $comments->name }}</a>
                        </span>
                        <span class="be-comment-time">
                            {{ $comments->created_at }}
                        </span>

                        <p class="be-comment-text">
                            {{ $comments->content }}
                        </p>
                    </div>
            @endforeach
            <div class="col-12 mt-4">
                <div class="d-flex justify-content-center">
                    {{ $comment->links() }}
                </div>
            </div>
        </div>
        <form class="form-block" action="{{ url('store/' . Str::slug($posts->post_name) . '/' . $posts->id) }}"
            method="post">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-6 mt-4">
                    <div class="form-group fl_icon">
                        <input class="form-input" type="text" placeholder="Your name" required="yes" name="name">
                    </div>
                </div>
                <div class="col-xs-12 mt-3">
                    <div class="form-group">
                        <textarea class="form-input" required="yes" name="comcont" placeholder="Your text"></textarea>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="d-flex justify-content-center">
                        <button class="btn submit-button mt-3 ps-5 pe-5" type="submit">Send Comment</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
