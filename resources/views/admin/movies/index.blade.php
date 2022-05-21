@extends('layouts.app')

@section('content')
{{--    <link rel="stylesheet" href="{{ asset('styles/movies.css') }}">--}}
<div class="container-fluid d-flex pt-5 min-vh-100 bg-dark" style="overflow-x: hidden">
    <div class="w-25">
        <a href="/movie/add" class="btn btn-success">Add Movie</a>
    </div>
    <div class="w-75">  <!-- Middle side menu -->
        @if(isset($err))
            <small class="text-success">{{ $err }}</small>
        @elseif(isset($success))
            <small class="text-success">{{ $success }}</small>
        @endif
        <h1 class="text-start text-white-50">Movies: </h1>
        @if(isset($movies))
            <div class="d-flex justify-content-center align-items-center w-100 mt-5">
                <div class="list-group w-100">
                    {{-- ########### draw movies ########## --}}
                    <div class="d-lg-flex flex-lg-wrap">
                    @foreach($movies as $movie)
                            <div class="movie">
                                <header class="movie-header"> <p> {{ $movie->movie_name }} </p> </header>
                                <div class="movie-body">
                                    <img src="{{ $movie->movie_thumbnail }}" alt="">
                                </div>
                                <div class="movie-buttons">
                                    <a href="/movie/edit/{{ $movie->id }}">Edit</a>
                                    <form action="/movie/delete/{{ $movie->id }}" class="w-50 text-center">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="m-0 p-0">Delete</button>
                                    </form>
                                </div>
                            </div>
                    @endforeach
                    {{-- ########### draw movies ########## --}}
                </div>
            </div>
        @else
            <div class="d-flex justify-content-center w-100 mt-5">
                <h1 class="text-info">Movies not added yet.</h1>
            </div>
        @endif
    </div>
{{--        <div class="w-25"> <!-- Right side menu -->--}}

{{--        </div>--}}
</div>

    <script>
        $('.movie-carousel').owlCarousel({
            loop: false,
            nav: false,
            dots: false,
            autoplay:false,
            autoplayTimeout:7000,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:2
                },
                1000:{
                    items:3
                }
            }
        });

        $('.badge-carousel').owlCarousel({
            loop: false,
            nav: false,
            dots: false,
            autoplay:false,
            autoplayTimeout:7000,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:2
                },
                1000:{
                    items:3
                }
            }
        });
    </script>
@endsection
