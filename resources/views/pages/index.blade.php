@extends('layouts.app')

@section('content')
    <style>
        .carousel .item {
            height: 80vh;
            width: 100vw !important;
            box-shadow: inset 0px 0px 25px 23px rgba(255, 255, 255, 0.7);
        }

        .carousel .item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;


        }

        .carousel {
            display: flex;
            opacity: 0.6;
            justify-content: center;
            align-items: center;
        }
    </style>
    <div class="ccontainer">

        <div class="carousel owl-carousel owl-theme">
            <div class="item">
                <img src="{{asset('images/banner/banner1.jpg')}}" alt="">
            </div>
            <div class="item">
                <img src="{{asset('images/banner/banner2.jpg')}}" alt="">
            </div>
            <div class="item">
                <img src="{{asset('images/banner/banner3.jpg')}}" alt="">
            </div>
        </div>

        <div class="movies">
            @if(isset($todayMovies))
                <div class="movie-header">
                    <h1 style="font-family: 'Roboto'">Latest Movies</h1>
                </div>
                <div class="movie-carousel">

                @foreach($todayMovies as $movie)
                    <a href="/movie/show/{{ $movie->id }}" class="ccard rgb item position-relative"
                       style="min-height: 50vh">
                        <div class="ccard-image" style="
                            background: linear-gradient(#fff0 0%, #fff0 70%, #1d1d1d 100%),url(' {{ $movie->movie_thumbnail }} ');
                            background-size: cover;
                            width: 100%;
                            height: 20vh;
                            "></div>
                        <div class="ccard-text">
                            <span class="date">{{ $movie->movie_release_date }}</span>
                            <h2 class="text-center"> {{ $movie->movie_name }} </h2>
                            <p
                                style="overflow-y: hidden;
                            max-height: 6rem;"> {{ $movie->movie_description }} </p>
                            <small class="position-absolute w-100 text-center"
                                   style="bottom: -7px; left: 0; right: 0">
                                Read More...
                            </small>
                        </div>
                    </a>
                @endforeach
            @endif
                </div>
            </div>

        <div class="movies">
            @if(sizeof($upcomingMovies) > 0)
                <div class="movie-header">
                    <h1 style="font-family: 'Roboto'">Upcoming Movies</h1>
                </div>
            <div class="movie-carousel">
                @foreach($upcomingMovies as $movie)
                    <a href="/movie/show/{{ $movie->id }}" class="ccard rgb item position-relative"
                       style="min-height: 50vh">
                        <div class="ccard-image" style="
                            background: linear-gradient(#fff0 0%, #fff0 70%, #1d1d1d 100%),url(' {{ $movie->movie_thumbnail }} ');
                            background-size: cover;
                            width: 100%;
                            height: 20vh;
                            "></div>
                        <div class="ccard-text">
                            <span class="date">{{ $movie->movie_release_date }}</span>
                            <h2 class="text-center"> {{ $movie->movie_name }} </h2>
                            <p
                                style="overflow-y: hidden;
                            max-height: 6rem;"> {{ $movie->movie_description }} </p>
                            <small class="position-absolute w-100 text-center"
                                   style="bottom: -7px; left: 0; right: 0">
                                Read More...
                            </small>
                        </div>
                    </a>
                @endforeach
            </div>
            @endif
        </div>

        <div class="movies">
            @if(sizeof($geoMovies) > 0)
                <div class="movie-header">
                    <h1 style="font-family: 'Roboto'">GEO Movies</h1>
                </div>
                <div class="movie-carousel">
                    @foreach($geoMovies as $movie)
                        <a href="/movie/show/{{ $movie->id }}" class="ccard rgb item position-relative"
                           style="min-height: 50vh">
                            <div class="ccard-image" style="
                                background: linear-gradient(#fff0 0%, #fff0 70%, #1d1d1d 100%),url(' {{ $movie->movie_thumbnail }} ');
                                background-size: cover;
                                width: 100%;
                                height: 20vh;
                                "></div>
                            <div class="ccard-text">
                                <span class="date">{{ $movie->movie_release_date }}</span>
                                <h2 class="text-center"> {{ $movie->movie_name }} </h2>
                                <p
                                    style="overflow-y: hidden;
                            max-height: 6rem;"> {{ $movie->movie_description }} </p>
                                <small class="position-absolute w-100 text-center"
                                       style="bottom: -7px; left: 0; right: 0">
                                    Read More...
                                </small>
                            </div>
                        </a>
                    @endforeach
                </div>
            @endif
        </div>

{{--        <div class="movies">--}}
{{--            @if(sizeof($engMovies) > 0)--}}
{{--                <div class="movie-header">--}}
{{--                    <h1 style="font-family: 'Roboto'">ENG Movies</h1>--}}
{{--                </div>--}}
{{--                <div class="movie-carousel">--}}

{{--                    @foreach($engMovies as $movie)--}}
{{--                        <a href="/movie/show/{{ $movie->id }}" class="ccard rgb item position-relative"--}}
{{--                           style="min-height: 50vh">--}}
{{--                            <div class="ccard-image" style="--}}
{{--                                background: linear-gradient(#fff0 0%, #fff0 70%, #1d1d1d 100%),url(' {{ $movie->movie_thumbnail }} ');--}}
{{--                                background-size: cover;--}}
{{--                                width: 100%;--}}
{{--                                height: 20vh;--}}
{{--                                "></div>--}}
{{--                            <div class="ccard-text">--}}
{{--                                <span class="date">{{ $movie->movie_release_date }}</span>--}}
{{--                                <h2 class="text-center"> {{ $movie->movie_name }} </h2>--}}
{{--                                <p--}}
{{--                                    style="overflow-y: hidden;--}}
{{--                            max-height: 6rem;"> {{ $movie->movie_description }} </p>--}}
{{--                                <small class="position-absolute w-100 text-center"--}}
{{--                                       style="bottom: -7px; left: 0; right: 0">--}}
{{--                                    Read More...--}}
{{--                                </small>--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
{{--            @endif--}}
{{--        </div>--}}
    <script src="{{asset('vanilla-tilt.min.js')}}"></script>
    <script src="{{asset('js/tilt.js')}}"></script>
    <script src="{{asset('js/carousel.js')}}"></script>
@endsection

