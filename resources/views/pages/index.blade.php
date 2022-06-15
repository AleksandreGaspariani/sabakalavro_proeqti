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

        .chide {
            display: none !important;
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
                <div class="movie-header d-flex w-100">
                    <div class="d-flex justify-content-start align-items-center w-50">
                        <h2 class="text-white display-5 ms-3">Latest Movies</h2>
                    </div>
                    <div class="d-flex justify-content-end align-items-center w-50 me-5" id="carouBtns">
                        <i class="bi bi-app display-5 text-white-50" onclick="wrap()" style="cursor: pointer"></i>
                        <i class="bi bi-app-indicator display-5 text-white-50" onclick="unwrap()" style="cursor: pointer"></i>
                    </div>
                </div>
{{--                <div id="LatMov">--}}

{{--                </div>--}}
                <div class="movie-carousel" id="carouselLatestMovies">
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
                                <h2 class="text-center" style="font-size: 1.5vw"> {{ $movie->movie_name }} </h2>
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
                <div class="d-flex w-100 flex-wrap chide justify-content-center" id="carouselLatestMoviesWrap">
                    @foreach($todayMovies as $movie)
                            <a href="/movie/show/{{ $movie->id }}" class="ccard rgb position-relative ms-auto me-auto"
                               style="min-height: 50vh;">
                                <div class="ccard-image" style="
                                    background: linear-gradient(#fff0 0%, #fff0 70%, #1d1d1d 100%),url(' {{ $movie->movie_thumbnail }} ');
                                    background-size: cover;
                                    width: 100%;
                                    height: 20vh;
                                    "></div>
                                <div class="ccard-text">
                                    <span class="date">{{ $movie->movie_release_date }}</span>
                                    <h2 class="text-center" style="font-size: 1.5vw"> {{ $movie->movie_name }} </h2>
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
            </div>
            @endif

        <div class="movies">
            @if(sizeof($upcomingMovies) > 0)
                <div class="movie-header">
                    <h1 style="font-family: 'Roboto'">Upcoming Movies</h1>
                </div>
            <div class="movie-carousel" id="carouselUpcomingMovies">
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

        <style>
            @media (max-width: 728px) {
                .ccard-text h2{
                    font-size: 3vw !important;
                }

                #carouselLatestMoviesWrap {
                    flex-direction: column !important;
                    justify-content: center !important;
                }
                .ccard {
                    width: 70% !important;
                }
            }
        </style>
    <script src="{{asset('vanilla-tilt.min.js')}}"></script>
    <script src="{{asset('js/tilt.js')}}"></script>
    <script src="{{asset('js/carousel.js')}}"></script>
@endsection

