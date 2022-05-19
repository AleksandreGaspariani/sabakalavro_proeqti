@extends('layouts.app')

@section('content')
    <div class="container-fluid bg-black min-vh-100 d-flex justify-content-center align-items-center">
        <form action="/store_category/{{ $movie->id }}" method="POST" class="d-flex flex-column w-25 m-auto">
            @csrf
            <h1 class="text-white-50 text-center">Add categories down below</h1>
            @for($i = 1; $i <= $categoryNum; $i++)
                <input type="text" name="category#{{ $i }}" placeholder="Category#{{ $i }}" class="m-2">
            @endfor
            <button type="submit" class="btn btn-primary m-2" name="num" value="{{$categoryNum}}">Add</button>
        </form>
    </div>
@endsection
