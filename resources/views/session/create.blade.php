@extends('layouts.app')

@section('content')
    <div class="d-flex flex-column w-100 bg-dark">
        <div class="d-flex flex-row justify-content-center">
            <h1 class="text-white-50">Add Session</h1>
        </div>
        <div class="d-flex flex-row justify-content-center align-items-center" style="min-height: 50vh">
            <form action="/session/store" method="get">
                @csrf
                <div class="form-group mt-5">
                    <label for="name" class="text-white-50">Movie</label>
                    <select class="form-select" name="movie_id">
                       @foreach($movies as $movie)
                            <option value="{{ $movie->id }}" class="text-dark">{{ $movie->movie_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mt-5">
                    <label for="hall" class="text-white-50">Hall</label>
                    <select class="form-select" name="sector_id">
                        @foreach($halls as $hall)
                            <option value="{{ $hall->id }}" class="text-dark">{{ $hall->number }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mt-5">
                    <label for="start_date" class="text-white-50">Start at</label>
                    <input class="form-control" type="datetime-local" id="start_at"
                           name="start_at" value="{{ old('start-at') }}">
                </div>
                <div class="form-group mt-5">
                    <label for="language" class="text-white-50">Language</label>
                    <input  class="form-control" type="text" placeholder="Language" name="language">
                </div>
                <div class="form-group mt-5">
                    <label for="Price" class="text-white-50">Price</label>
                    <input  class="form-control" type="number" placeholder="Price" name="price">
                </div>
                <button type="submit" class="btn btn-outline-success text-center mt-5">Submit</button>
            </form>
        </div>
    </div>

@endsection
