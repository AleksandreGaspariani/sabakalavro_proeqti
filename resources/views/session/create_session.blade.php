@extends('layouts.app')

@section('content')
    <div class="d-flex flex-column w-75">
        <div class="d-flex flex-row justify-content-center">
            <h1>Create Session</h1>
        </div>
        <div class="d-flex flex-row justify-content-center">
            <form action="{{ route('session.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Movie</label>
                    <option type="text" class="form-control" id="name" name="name" placeholder="Name">

                    </option>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" id="description" name="description" placeholder="Description">
                </div>
                <div class="form-group">
                    <label for="start_date">Start Date</label>
                    <input type="date" class="form-control" id="start_date" name="start_date" placeholder="Start Date">
                </div>
                <div class="form-group">
                    <label for="end_date">End Date</label>
                    <input type="date" class="form-control" id="end_date" name="end_date" placeholder="End Date">
                </div>
                <div class="form-group">
                    <label for="location">Location</label>
                    <input type="text" class="form-control" id="location" name="location" placeholder="Location">
                </div>
                <div class="form-group">
                    <label for="max_attendees">Max Attendees</label>
                    <input type="number" class="form-control" id="max_attendees" name="max_attendees" placeholder="Max Attendees">
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" class="form-control" id="price" name="price" placeholder="Price">
                </div>
                <div class="form-group">
                    <label for="image">Image</
    </div>
@endsection
