@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('styles/movies.css') }}">
<div class="container-fluid d-flex pt-5 min-vh-100 bg-dark">
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
                    <div class="movie-carousel">
                    @foreach($movies as $movie)
                        <a class="item" href="movie/show/{{ $movie -> id }}">
                            <img src="{{ $movie-> movie_thumbnail }}" alt="" width="450px" height="auto">
                            <h1>{{ $movie->movie_name}}</h1>
                            <p>{{ $movie-> movie_description }}</p>
                        </a>
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

        $("div.test").add("p.quote").addClass("blue").slideDown("slow");

        $.each(
            [1,2,3], function() {
                document.write(this + 1);
            }
        );

    </script>
@endsection
