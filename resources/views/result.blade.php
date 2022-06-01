@extends('layout.main')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-white text-center">Results : ({{ count($results) }})</h1>
            </div>
            @forelse($results as $post)
                <div class="col-xl-4 col-md-6 col-sm-12 mt-5">
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex justify-content-center">
                                <div class="card" style="width: 18rem;">
                                    <a href="{{ route('postname', ['post' => $post->slug]) }}"><img
                                            src="{{ url('storage/' . $post->image1) }}" style="height:20rem;"
                                            class="card-img-top" alt="..."></a>
                                    <div class="card-body">
                                        <a href="{{ url('category', ['categoryid' => $post->category_name]) }}"
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
                    </div>
                </div>
            @empty
                <div class="d-flex justify-content-center align-items-center flex-column text-white">
                    <h1>Game Not Found !!!</h1>
                    <img src="https://www.callcentrehelper.com/images/stories/2020/06/despair-at-failure-cartoon-760.png"
                        alt="" class="img-fluid">
                </div>
            @endforelse

            <div class="d-flex justify-content-center">
                {{ $results->appends(request()->except('page'))->links() }}
            </div>
        </div>
    </div>
@endsection
