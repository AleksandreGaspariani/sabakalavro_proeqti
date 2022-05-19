@extends('layouts.app')

@section('content')
    <div class="container-fluid min-vh-100 d-flex justify-content-center align-items-center bg-black">
        <form action="/movie/update/{{ $movie->id }}">
            @csrf
            <div class="d-flex">
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
            <div class="d-flex m-1">
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
            <div class="d-flex m-1">
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
            <div class="d-flex flex-column">
                <label for="category" class="text-white-50">How much categories you want to add?</label>
                <input type="number" class="form-control" name="numberOfCategories">
            </div>

            <div class="form-group m-1 text-center pt-5">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
