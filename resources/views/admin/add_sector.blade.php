@extends('layouts.app')

@section('content')
    <div class="d-flex w-100 justify-content-center align-items-center min-vh-100 bg-dark">
        <form class="w-25 mt-5" action="/add-sector" method="POST" class="pt-5" enctype="multipart/form-data">
            <h1 class="display-6 mb-5">Add Hall.</h1>
            @csrf
            <div class="mb-3 shadow">
                <input type="text" class="form-control" placeholder="Hall Number: " name="number">
            </div>
            <div class="mb-3 shadow">
                <input type="number" class="form-control" placeholder="Rows: " name="rows">
            </div>
            <div class="mb-3 shadow">
                <input type="number" class="form-control" placeholder="Seats: " name="seats">
            </div>
            <div class="m-auto w-50 m-auto">
                <button class="btn btn-success w-100 mt-3" type="submit">Add Hall</button>
            </div>
        </form>
    </div>
@endsection
