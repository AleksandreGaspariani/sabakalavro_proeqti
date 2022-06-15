@extends('layouts.app')

@section('content')
    <div class="min-vh-100 d-flex justify-content-start align-items-start">
        <img src="{{ $movie->movie_thumbnail }}" alt="" width="400px" height="auto">
        @foreach($movie->sessions as $session)
            <div class="card m-2" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{ $movie->movie_name }}</h5>
                    <p class="card-text">{{ $session->sector_id }}</p>
                    <p class="card-text">{{ $session->start_at }}</p>
                    <p class="card-text">{{ $session->and_at }}</p>
                    <p class="card-text">{{ $session->price }} GEL</p>
{{--                    <a href="{{ route('ticket.create', ['session' => $session->id]) }}" class="btn btn-primary">Buy Ticket</a>--}}
                    <a href="#" class="btn btn-primary">Buy Ticket</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
