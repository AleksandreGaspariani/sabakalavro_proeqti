@extends('layouts.app')

@section('content')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Rajdhani:wght@500&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Orbitron&display=swap');
    </style>
    <div class="jumbotron">
    @if(isset($status))
        <h3>{{ $status }}</h3>
    @endif
    <div class="row justify-content-center w-100 p-0 m-0">
        @auth()
            <div class="bg-black">
                <div class="container d-flex flex-column">
                    <div class="w-100 pt-5">
                        <h3 class="text-center text-white-50" style="font-family: 'Rajdhani';">Welcome back <span class="text-success">{{ Auth::user()->name }}</span></h3>
                    </div>
                    <div class="d-flex w-100">
                        <div id="leftPanel" class="h-auto w-100" style="min-height: 50vh">
                            <div>
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    <img src="{{ asset('images/user.png') }}" alt="{{ Auth::user()->name }}" width="25%">
                                    <p class="text-white text-start">{{ Auth::user()->name }}</p>
                                    <p class="text-white">{{ Auth::user()->email }}</p>
                                    <small class="text-white-50 text-start">Your card information: </small>
                                    @if(isset(Auth::user()->card[0]))
                                        <p class="text-primary">{{ Auth::user()->card[0]->card_name }}</p>
                                        @if(isset(Auth::user()->card[0]->card_number))
                                            <p class="text-info ">{{Auth::user()->card[0]->hiddenCardNumber}}</p>
                                        @endif


                                        <a href="edit/card" class="btn btn-outline-light">Edit Card</a>
                                    @else
                                        <p class="text-white">No card information</p>
                                        <a href="add/card" class="btn btn-outline-light">Add Card</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div id="rightPanel" class="h-auto w-100" style="min-height: 50vh">

                        </div>
                    </div>
                </div>
            </div>
            @if(Auth::user()->role == 1)
                <div class="d-flex justify-content-center align-items-center bg-black">
                    <a href="/sectors" class="btn btn-outline-light m-3" style="padding: 1.2rem 2rem">
                        Sector Manipulations
                    </a>
                    <a href="/movies" class="btn btn-outline-light m-3" style="padding: 1.2rem 2rem">
                        Movie Manipulations
                    </a>
                    <a href="#" class="btn btn-outline-light m-3" style="padding: 1.2rem 2rem">
                        Session Manipulation
                    </a>
                </div>
            @endif
        @endauth

    </div>
</div>
@endsection
