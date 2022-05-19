@extends('layouts.app')

@section('content')
    @if(isset($data))
        @if(isset($err))
            <div class="card w-100 d-flex align-items-center">
                <h1 class="card-header display-6 text-danger">{{ $err }}</h1>
            </div>
        @endif
    <div class="d-flex w-100 justify-content-center align-items-center min-vh-100 bg-dark" style="flex-direction: column">
        <h1>Edit Hall.</h1>
        <form class="w-25 mt-5" action="/update-sector/{{ $data->number }}" method="POST" class="pt-5" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 shadow">
                <label for="number">Hall Number: </label>
                <input type="text" class="form-control" placeholder="Hall Number: " name="number" value="{{ $data->number }}" disabled>
            </div>
            <div class="mb-3 shadow">
                <label for="number">Rows: </label>
                <input type="text" class="form-control" placeholder="Rows: " name="rows" value="{{ $data->rows }}">
            </div>
            <div class="mb-3 shadow">
                <label for="number">Seats: </label>
                <input type="text" class="form-control" placeholder="Seats: " name="seats" value="{{ $data->seats }}">
            </div>
            <div class="m-auto w-50 m-auto">
                <button class="btn btn-info w-100 mt-3" type="submit">Edit Hall</button>
            </div>
        </form>
    </div>
    @else
        {{ redirect('/sectors') }}
    @endif
@endsection
