@extends('layout.main')

<head>
    <meta name="title" content="{{ $posts->post_name }}">
    <meta name="description" content="{{ $posts->keywords }}">
    <meta name="keywords" content="{{ $posts->keywords }}">
    <title>{{ $posts->post_name }}</title>
    <!-- Core Style Css -->
    <link rel="stylesheet" href="{{ asset('css/postpage.css') }}" />
</head>
@section('content')
    <div class="container text-white">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center mb-5">{{ $posts->post_name }}</h1>
                <div class="d-flex justify-content-center">
                    <img src="{{ url('storage/' . $posts->image1) }}" alt="{{ $posts->post_name }}"
                        class="postimg">
                </div>
            </div>
            <div class="offset-1 col-10 offset-1 mt-3">
                <h2>Game Details:</h2>
                <h5>Title: {{ $posts->post_name }}</h5>
                <h5>Genre: {{ $posts->category_name }}</h5>
                <h5>Size: {{ $posts->size }}</h5>
                <h5>DLC: {{ $posts->dlcs }}</h5>
                <h5>Developer: {{ $posts->developer }}</h5>
                <h5>Release Year: {{ $posts->release_year }}</h5>
                <h5>Steam Link: <a href="{{ $posts->steam_link }}" target="_blank"><input type="text"
                            placeholder="Go to Steam Link" class="bg-dark inputc ms-3"></a></h5>
                <h5>Game Version: {{ $posts->game_version }}</h5>
                <h5>Keywords: {{ $posts->keywords }}</h5>
            </div>
            <div class="offset-1 col-10 offset-1 mt-3">
                <p>{!! html_entity_decode($posts->post_body) !!}</p>
            </div>
            <div class="col-12 text-center">
                <h3>Torrent Links :</h3>
                <a href="{{ $posts->t_link }}" target="_blank"><input type="text" placeholder="Click For Torrent Link -1"
                        class="bg-dark inputc"></a>
            </div>
            <div class="col-12 text-center mt-4">
                <h3>Screenshoots :</h3>
                <img src="{{ url('storage/' . $posts->image2) }}" alt="{{ $posts->post_name }}"
                    class="scsimg img-fluid mt-4">
                <img src="{{ url('storage/' . $posts->image3) }}" alt="{{ $posts->post_name }}"
                    class="scsimg img-fluid mt-5">
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
                    {!! $comment->links() !!}
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
                        <textarea class="form-input" required="yes" name="content" placeholder="Your text"></textarea>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-dark mt-3 ps-5 pe-5" type="submit">Send Comment</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
