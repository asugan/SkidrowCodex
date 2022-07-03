@extends('layout.main')
@section('title', 'Skidrow and Codex Torrent')
@section('description',
    'Skidrow and Codex Torrent-Download Games for PC with Torrent, Repacks, patches and
    updates,Crack By SKIDROW, 3DM, RELOADED, CODEX, PROPHET, CPY',)
@section('keywords',
    'Skidrow,Codex,Torrent,PC Torrent,Repack,Skidrow
    Reloaded,Reloaded,Cpy,Skidrow,Torrent,Reloaded,Torrent,Torrent Download,Skidrow and Codex Torrent',)
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
                                ({{ $categories->post_count }})
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-xl-7 col-sm-12 ps-3 pe-3">
                <div class="row">
                    @foreach ($posts as $post)
                        <div class="col-12 bg-white mt-3 mb-3">
                            <div class="pt-3 pb-2">
                                <h2 class="text-dark text-center"> {{ $post->post_name }} </h2>
                            </div>
                            <div class="d-flex justify-content-center align-items-center pb-3">
                                <a href="{{ url('category', ['category' => $post->category_name]) }}"
                                    class="text-decoration-none categoryhover">
                                    <div class="ps-4 pe-4 pt-2 pb-2">
                                        <h4 class="mt-auto mb-auto">{{ $post->category_name }}</h4>
                                    </div>
                                </a>
                            </div>
                            <div class="text-center">
                                <a href="{{ route('postname', ['post' => $post->slug]) }}"><img
                                        src="{{ url('storage/' . $post->image1) }}"
                                        style="width: 18rem; min-height: 25rem" class="card-img-top" alt="..."></a>
                            </div>
                            <div class="d-flex justify-content-center align-items-center mt-3">
                                <div class="ps-4 pe-4 pt-2 pb-2 categoryhover">
                                    <h5 class="mt-auto mb-auto">🗝️ {{ $post->keywords }}</h5>
                                </div>
                            </div>
                            <div class="sizebg pt-3 pb-2 ps-3 pe-3 mt-3 mb-3">
                                <p> {{ $post->seo_description }} </p>
                            </div>
                            <div class="d-flex justify-content-center align-items-center pb-3">
                                <div>
                                    <button class="btn post-button ps-4 pe-4">Download</button>
                                </div>
                                <div class="sizebg ps-3 pe-3 pt-2 pb-2 ms-3">
                                    <div>
                                        <p class="mt-auto mb-auto">{{ $post->size }}</p>
                                    </div>
                                </div>
                                <div>
                                    <div class="sizebg ps-3 pe-3 pt-2 pb-2 ms-3">
                                        <p class="mt-auto mb-auto">Comments: {{ $post->comment_count }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="d-flex justify-content-center mt-5">
                        {{ $posts->links() }}
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
