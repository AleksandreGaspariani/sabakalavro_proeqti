@extends('layouts.app')

@section('content')
    <div class="container-fluid min-vh-100 d-flex justify-content-center align-items-center bg-black w-100" id="toCol">
        <div class="d-flex flex-column w-100 justify-content-center align-items-center">
            <form action="/movie/update/{{ $movie->id }}">
                @csrf
                <div class="d-flex flex-column m-1 w-100">
                    <div class="form-group m-1">
                        <label for="title" class="text-white-50">Name</label>
                        <input type="text" class="form-control" name="movie_name" placeholder="Enter movie Name"
                               value="{{ $movie->movie_name ?? 'Empty'}}"
                        >
                    </div>
                    <div class="form-group m-1">
                        <label for="title" class="text-white-50">Description</label>
                        <input type="text" class="form-control" name="movie_description" placeholder="Enter description"
                               value="{{ $movie->movie_description ?? 'Empty'}}"
                        >
                    </div>
                </div>
                <div class="d-flex flex-column m-1 w-100">
                    <div class="form-group m-1">
                        <label for="title" class="text-white-50">Thumbnail</label>
                        <input type="text" class="form-control" name="movie_thumbnail" placeholder="Enter link of thumbnail"
                               value="{{ $movie->movie_thumbnail ?? 'Empty'}}"
                        >
                    </div>
                    <div class="form-group m-1">
                        <label for="title" class="text-white-50">Trailer</label>
                        <input type="text" class="form-control" name="movie_trailer" placeholder="Enter movie trailer link"
                               value="{{ $movie->movie_trailer ?? 'Empty'}}"
                        >
                    </div>
                </div>
                <div class="d-flex flex-column m-1 w-100">
                    <div class="form-group m-1">
                        <label for="title" class="text-white-50">Duration</label>
                        <input type="text" class="form-control" name="movie_duration" placeholder="Enter link of thumbnail"
                               value="{{ $movie->movie_duration ?? 'Empty'}}"
                        >
                    </div>
                    <div class="form-group m-1">
                        <label for="title" class="text-white-50">Release date</label>
                        <input type="date" class="form-control" name="movie_date" placeholder="Enter movie trailer link"
                               value="{{ $movie->movie_release_date}}"
                        >
                    </div>
                </div>
                <div class="d-flex flex-column w-100 m-1">
                    <label for="category" class="text-white-50">How much categories you want to add?</label>
                    <input type="number" class="form-control" name="numberOfCategories">
                </div>

                <div class="form-group m-1 text-center pt-5">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>

        <div class="d-flex justify-content-center align-items-center w-100">
            <a href="#" class="ccard rgb position-relative"
               style="min-height: 50vh; width: 30%">
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
        </div>
    </div>
    <script src="{{asset('vanilla-tilt.min.js')}}"></script>
    <script src="{{asset('js/tilt.js')}}"></script>
    <script src="{{asset('js/carousel.js')}}"></script>
    <style>
        @media (max-width: 600px) {
            #toCol {
                display: flex;
                flex-direction: column !important;
                width: 100% !important;
                justify-content: normal !important;
            }
            .ccard {
                width: 70% !important;
            }
        }
    </style>
    <script>

    </script>
@endsection
