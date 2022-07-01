@extends('layout.main')

@section('title', $category->category_name)
@section('description', $category->category_name)
@section('keywords',
    'Skidrow,Codex,Torrent,PC Torrent,Repack,Skidrow Reloaded,Reloaded,Cpy,Skidrow Torrent,Reloaded
    Torrent,Torrent Download,Skidrow and Codex Torrent',)

@section('content')
    <div class="container">
        <div class="row">
            <div class="offset-2 col-8 offset-2">
                <form action="{{ route('search') }}" method="get">
                    {{ csrf_field() }}
                    <input type="search" name="search" placeholder="Search a Game!" aria-describedby="button-addon1"
                        class="form-control border-0 bg-light">
                    <button id="button-addon1" type="submit" class="btn btn-link text-primary"><i
                            class="fa fa-search"></i></button>
                </form>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center text-white">{{ $category->category_name }} ({{ count($category->post) }})
                </h1>
                <div class="container">
                    <div class="row">
                        @foreach ($post as $posts)
                            <div class="col-12 bg-white mt-3 mb-3">
                                <div class="pt-3 pb-2">
                                    <h2 class="text-dark text-center"> {{ $posts->post_name }} </h2>
                                </div>
                                <div class="d-flex justify-content-center align-items-center pb-3">
                                    <a href="{{ url('category', ['category' => $posts->category_name]) }}"
                                        class="text-decoration-none categoryhover">
                                        <div class="ps-4 pe-4 pt-2 pb-2">
                                            <h4 class="mt-auto mb-auto">{{ $posts->category_name }}</h4>
                                        </div>
                                    </a>
                                </div>
                                <div class="text-center">
                                    <a href="{{ route('postname', ['post' => $posts->slug]) }}"><img
                                            src="{{ url('storage/' . $posts->image1) }}"
                                            style="width: 18rem; min-height: 25rem" class="card-img-top" alt="..."></a>
                                </div>
                                <div class="sizebg pt-1 pb-2 ps-3 pe-3 mt-4 mb-4">
                                    <p> {!! html_entity_decode($posts->post_body) !!} </p>
                                </div>
                                <div class="d-flex justify-content-center align-items-center pb-3">
                                    <div>
                                        <button class="btn post-button ps-4 pe-4">Download</button>
                                    </div>
                                    <div class="sizebg ps-3 pe-3 pt-2 pb-2 ms-3">
                                        <div>
                                            <p class="mt-auto mb-auto">{{ $posts->size }}</p>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="sizebg ps-3 pe-3 pt-2 pb-2 ms-3">
                                            <p class="mt-auto mb-auto">Comments: {{ $posts->comment_count }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    {{ $post->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
