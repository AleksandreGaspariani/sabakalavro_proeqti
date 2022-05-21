@extends('layouts.app')

@section('content')
    <div class="min-vh-100 d-flex justify-content-start align-items-start">
        <img src="{{ $movie->movie_thumbnail }}" alt="" width="400px" height="auto">
    </div>
@endsection
