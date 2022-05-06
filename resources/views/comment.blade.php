@extends('layouts.app')

@section('content')
    <section class="container">
        <div class="row mb-5">
            @foreach($comments as $comment)
                <div class="col-12 py-3 border-bottom border-secondary border-1">
                    <p class="d-block">{{ $comment->content }}</p>
                    <i>{{ $comment->author }}</i>
                </div>
            @endforeach
        </div>
        <div class="row">
            {{ $comments->links() }}
        </div>
    </section>
@endsection
