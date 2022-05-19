@extends('layouts.app')

@section('content')

    <div class="min-vh-100 d-flex align-items-center justify-content-center">
        <form action="/store_movie">
            @csrf
            <div class="d-flex">
                <div class="form-group m-1">
                    <label for="title">Name</label>
                    <input type="text" class="form-control" name="movie_name" placeholder="Enter movie Name">
                </div>
                <div class="form-group m-1">
                    <label for="title">Description</label>
                    <input type="text" class="form-control" name="movie_description" placeholder="Enter description">
                </div>
            </div>
            <div class="d-flex m-1">
                <div class="form-group m-1">
                    <label for="title">Thumbnail</label>
                    <input type="text" class="form-control" name="movie_thumbnail" placeholder="Enter link of thumbnail">
                </div>
                <div class="form-group m-1">
                    <label for="title">Trailer</label>
                    <input type="text" class="form-control" name="movie_trailer" placeholder="Enter movie trailer link">
                </div>
            </div>
            <div class="d-flex m-1">
                <div class="form-group m-1">
                    <label for="title">Duration</label>
                    <input type="text" class="form-control" name="movie_duration" placeholder="Enter link of thumbnail">
                </div>
                <div class="form-group m-1">
                    <label for="title">Release date</label>
                    <input type="date" class="form-control" name="movie_date" placeholder="Enter movie trailer link">
                </div>
            </div>

            <div class="form-group m-1">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>

@endsection
