@extends('layouts.app')

@section('content')
    <section class="container">
        <div class="row mb-5">
            @foreach($users as $user)
                <div class="col-12 py-3 border-bottom border-secondary border-1">
                    <h2 class="d-block">{{ $user->name }}</h2>
                    <i>{{ $user->email }}</i>
                </div>
            @endforeach
        </div>
        <div class="row">
            {{ $users->links() }}
        </div>
    </section>
@endsection
