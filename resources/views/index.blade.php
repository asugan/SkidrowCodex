@extends('layout.main')
@section('title', 'Skidrow and Codex Torrent')
@section('description', 'Skidrow and Codex Torrent-Download Games for PC with Torrent, Repacks, patches and updates,Crack By SKIDROW, 3DM, RELOADED, CODEX, PROPHET, CPY')
@section('keywords', 'Skidrow,Codex,Torrent,PC Torrent,Repack,Skidrow Reloaded,Reloaded,Cpy,Skidrow,Torrent,Reloaded,Torrent,Torrent Download,Skindrow and Codex Torrent')
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
            <div class="col-xl-2">
                <h3 class="text-white text-center">Categories</h3>
                <ul class="list-group">
                    @foreach ($category as $categories)
                        <li class="list-group-item mt-3 text-center">
                            <a href="{{ route('category', ['category' => $categories->category_name]) }}"
                                class="text-dark text-decoration-none">{{ $categories->category_name }}
                                ({{ count($categories->post) }})
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-xl-7 col-sm-12">
                <div class="row">
                    @foreach ($posts as $post)
                        <div class="col-md-6 col-sm-12 mt-5">
                            <div class="d-flex justify-content-center">
                                <div class="card" style="width: 18rem; min-height:30rem;">
                                    <a href="{{ route('postname', ['post' => $post->slug]) }}"><img
                                            src="{{ url('storage/' . $post->image1) }}" style="height:20rem;"
                                            class="card-img-top" alt="..."></a>
                                    <div class="card-body">
                                        <a href="{{ url('category', ['category' => $post->category_name]) }}"
                                            class="text-decoration-none text-dark">
                                            <p class="card-text mt-1 mb-1">{{ $post->category_name }}</p>
                                        </a>
                                        <a href="{{ route('postname', ['post' => $post->slug]) }}"
                                            class="text-decoration-none text-dark">
                                            <h2 class="card-title text-center">{{ $post->post_name }}</h2>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="d-flex justify-content-center mt-5">
                        {!! $posts->links() !!}
                    </div>
                </div>
            </div>
            <div class="col-xl-3 recommended mt-3">
                <h3 class="text-white text-center">Recommended Games</h3>
                @foreach ($postrecommended as $postr)
                    <div class="col-12 mt-3">
                        <a href="{{ route('postname', ['post' => $postr->slug]) }}"><img
                                src="{{ url('storage/' . $postr->image1) }}" style="height:20rem;" class="card-img-top"
                                alt="..."></a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
