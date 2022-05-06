@extends('layouts.app')

@section('content')
    <section class="container">
        <div class="row">
            @foreach($posts as $post)
                <div class="col-12 py-3 border-bottom border-secondary border-1">
                    <h2 class="d-block">{{ $post->title }}</h2>
                    <p class="d-block">{{ $post->content }}</p>
                    <i>{{ $post->author }}</i>
                </div>
            @endforeach
        </div>
        <div class="row">
            {{ $posts->links() }}
        </div>
    </section>
@endsection
