@extends('layouts.app')

@section('content')
    <div class="jumbotron w-100 min-vh-100 d-flex flex-row" style="background-color: #1c1f23">
        <div class="w-75">
            <h2 class="text-white-50 w-100 text-center mt-3">Choose your seat.</h2>
            <div class="container-fluid flex-column">
                @for($row = 1; $row <= $session->sector->rows; $row++)
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <div class="d-flex flex-row justify-content-center align-items-center">
                            @for($seat = 1; $seat <= $session->sector->seats; $seat++)
{{--                                <b class="btn{{$row}}{{$seat}} display-4 text-white" onclick="addOrderToCart({{$row}},{{$seat}},{{$session->sector->number}})">[]</b>--}}
                                <i class="fa-solid fa-chair text-white m-2 display-4 btn{{$row}}{{$seat}}" onclick="addOrderToCart({{$row}},{{$seat}},{{$session->sector->number}})"></i>
                            @endfor
                        </div>
                    </div>
                @endfor
            </div>
        </div>
        <div class="w-25 d-flex flex-column ps-5 pe-5">
            <h3 class="text-white-50">Your chosen seats:</h3>
            <div class="d-flex flex-column w-100 border rounded border-info justify-content-start h-auto mb-5" id="orderCart">

            </div>
        </div>
    </div>
@endsection
