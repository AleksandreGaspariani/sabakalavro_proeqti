@extends('layouts.app')

@section('content')
    <div class="min-vh-100 bg-dark d-flex flex-column justify-content-center align-items-center">
        <form action="/store-card" method="POST" enctype="multipart/form-data">
            @method('POST')
            @csrf

            <input type="text" placeholder="Card Name" name="card_name">

            <div class="d-flex">
                <input type="text" placeholder="Owner name" name="owner_name">
                <input type="text" placeholder="Owner Lastname" name="owner_lastname">
            </div>

            <input type="text" placeholder="Card Number" name="card_number">
            <input type="text" placeholder="Card Expiry" name="card_expiry">
            <input type="text" placeholder="Card CVV" name="card_cvv">

            <button type="submit" class="btn-outline-light">Add</button>
        </form>
    </div>
@endsection
