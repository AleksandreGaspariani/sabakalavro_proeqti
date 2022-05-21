@extends('layouts.app')

@section('content')
    <div class="h-auto">
        <div class="container-fluid position-relative bg-dark">
            <div style="height: 60vh; width: 100%" class="d-flex justify-content-center align-items-center pt-3">
                <img src="{{ $movie->movie_thumbnail }}" alt="{{ $movie->movie_name }}" style="
                object-fit: fill;
                width: auto;
                height: 100%;
               ">
            </div>
            <div class="d-flex justify-content-center align-items-center" style="flex-direction: column">
                <h1 class="mt-5 text-white">Movie</h1>
                <span style="color: darkred; font-size: 22px" class="w-50 bg-dark bg-opacity-25 text-dark border rounded-3 p-5 text-center text-white">{{ $movie->movie_name }}</span>
                <h2 class="text-white">Description</h2>
                <small class="w-50 bg-dark bg-opacity-25 text-dark border rounded-3 p-5 text-white" style="font-size: 22px"> {{ $movie->movie_description }}
                    <br>
                    <br>
                    <p style="color: #0a58ca; font-size: 16px">Duration: <small style="color: #4f5050">{{ $time }} Hours</small></p>
                    <p style="color: #0a58ca; font-size: 16px">Release Date: <small style="color: #4f5050">{{ $movie-> movie_release_date }}</small></p>
                </small>
                <h2>Trailer</h2>
                <div class="w-50 position-relative" style="">
                    <iframe width="100%" height="400px"
                            style="border-radius: 15px; object-fit: fill"
                            src="{{ $movie->movie_trailer }}?controls=1">
                    </iframe>
                </div>
                <div class="d-flex justify-content-start w-50 text-start">
                    @foreach($movie->categories as $category)
                        <span class="pt-1 pb-1 ps-2 pe-2 border rounded border-info text-white-50 ms-1">{{ $category->category }}</span>
                    @endforeach
                </div>
                <div class="w-50 text-center m-5">
                    <a href="/sessions/{{ $movie->id }}" class="btn btn-outline-light m-auto">Buy ticket</a>
                    @auth()
                        @if(Auth::user()->role == '1')

                            @if($movie->categories->count() > 0)
                                <div class="d-flex w-100 justify-content-start align-items-center">

                                    @foreach($movie->categories as $category)
                                        <form action="/delete_category/{{ $category->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger m-auto">{{ $category->category }}</button>
                                        </form>
                                    @endforeach
                                </div>
                            @endif

                            <div class="btn-group d-flex justify-content-center align-items-center mb-5 mt-5">
                                <a href="/movie/edit/{{$movie->id}}" class="btn btn-outline-primary w-50 rounded">Edit</a>
                                <form action="/movie/delete/{{$movie->id}}" class="w-50">
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger w-100">Delete</button>
                                </form>
                            </div>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>
@endsection
