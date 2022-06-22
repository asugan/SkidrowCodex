@extends('layout.main')

@section('title', $category->category_name)
@section('description', $category->category_name)
@section('keywords', 'Skidrow,Codex,Torrent,PC Torrent,Repack,Skidrow Reloaded,Reloaded,Cpy,Skidrow Torrent,Reloaded Torrent,Torrent Download,Skindrow and Codex Torrent',)

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
                            <div class="col-xl-4 col-md-6 col-sm-12 mt-5">
                                <div class="row">
                                    <div class="d-flex justify-content-center">
                                        <div class="card" style="width: 18rem; min-height:30rem;">
                                            <a href="{{ route('postname', ['post' => $posts->slug]) }}"><img
                                                    src="{{ url('storage/' . $posts->image1) }}" style="height:20rem;"
                                                    class="card-img-top" alt="..."></a>
                                            <div class="card-body">
                                                <a href="{{ url('category', ['categoryid' => $posts->category_name]) }}"
                                                   class="text-decoration-none text-dark">
                                                    <p class="card-text mt-1 mb-1">{{ $posts->category_name }}</p>
                                                </a>
                                                <a href="{{ route('postname', ['post' => $posts->slug]) }}"
                                                   class="text-decoration-none text-dark">
                                                    <h2 class="card-title text-center">{{ $posts->post_name }}
                                                    </h2>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    {!! $post->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
