@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    <a href="/posts" class="me-3">Posty</a>
                    <a href="/comments" class="me-3">Komentarze</a>
                    <a href="/users" class="me-3">Użytkownicy</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
