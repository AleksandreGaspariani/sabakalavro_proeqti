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
                <input hidden class="d-none" id="movieID" value="{{$movie->id}}">
                <span style="color: darkred; font-size: 22px"
                      class="w-50 bg-dark bg-opacity-25 text-dark border rounded-3 p-5 text-center text-white cwidth_100">{{ $movie->movie_name }}</span>
                <h2 class="text-white">Description</h2>
                <small class="w-50 bg-dark bg-opacity-25 text-dark border rounded-3 p-5 text-white cwidth_100"
                       style="font-size: 22px"> {{ $movie->movie_description }}
                    <br>
                    <br>
                    <p style="color: #0a58ca; font-size: 16px">Duration: <small style="color: #4f5050">{{ $time }}
                            Hours</small></p>
                    <p style="color: #0a58ca; font-size: 16px">Release Date: <small
                            style="color: #4f5050">{{ $movie-> movie_release_date }}</small></p>
                </small>
                <h2>Trailer</h2>
                <div class="w-50 position-relative cwidth_100" style="">
                    <iframe width="100%" height="400px"
                            style="border-radius: 15px; object-fit: fill"
                            src="{{ $movie->movie_trailer }}?controls=1">
                    </iframe>
                </div>
                <div class="d-flex justify-content-start w-50 text-start">
                    @foreach($movie->categories as $category)
                        <span
                            class="pt-1 pb-1 ps-2 pe-2 border rounded border-info text-white-50 ms-1">{{ $category->category }}</span>
                    @endforeach
                </div>
                <div class="w-100 text-center m-5 d-flex flex-column justify-content-center align-items-center">
                    {{--                    Session navbar           --}}
                    <h3 class="text-white-50">Sessions</h3>
                    <div class="navbar-nav d-flex flex-row justify-content-center align-items-center">
                        @if($movie->sessions->count() > 0)
                            @foreach($movie->sessions as $session)
                                @if($session->start_at >= now())
                                    <div
                                        style='padding: 10px 25px; margin: .1rem ; border-top-right-radius: 15px; background: red'>
                                        <button class="text-decoration-none text-black"
                                                style="font-size: 24px; border: none; background: none"
                                                name="dateButton"
                                                data-index="{{date("m-d",strtotime($session->start_at))}}"
                                                value="{{date("y-m-d", strtotime($session->start_at))}}">{{ date("F j",strtotime($session->start_at)) }}</button>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                    </div>
                    <div
                        class="w-100 border border rounded-3 d-flex flex-wrap justify-content-center align-items-center"
                        style="padding: 1rem 2rem" id="sessionContainer">
                    </div>
                    {{--                    Session navbar END       --}}

                    {{--                    <a href="/ticket/movie/{{ $movie->id }}" class="btn btn-outline-light m-auto">Buy ticket</a>--}}
                    @auth()
                        @if(Auth::user()->role == '1')

                            @if($movie->categories->count() > 0)
                                <div class="d-flex w-100 justify-content-start align-items-center">

                                    @foreach($movie->categories as $category)
                                        <form action="/delete_category/{{ $category->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="btn btn-outline-danger m-auto">{{ $category->category }}</button>
                                        </form>
                                    @endforeach
                                </div>
                            @endif

                            <div class="btn-group d-flex justify-content-center align-items-center mb-5 mt-5 w-50">
                                <a href="/movie/edit/{{$movie->id}}"
                                   class="btn btn-outline-primary w-50 rounded">Edit</a>
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
@section('scripts')
    <script src="{{asset('js/sessionController.js')}}">

    </script>
@endsection
