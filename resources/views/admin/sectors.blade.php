@extends('layouts.app')

@section('content')
    <div class="container-fluid vh-100 d-flex pt-5 bg-dark">
        <div class="w-25"> <!-- Left side menu -->
            <a href="sector/add" class="btn btn-outline-success w-50 ">Add Hall</a>
        </div>

        <div class="w-75">  <!-- Middle side menu -->
            @if(isset($err))
                <small class="text-success">{{ $err }}</small>
            @elseif(isset($success))
                <small class="text-success">{{ $success }}</small>
            @endif
            <h1 class="text-start text-white-50">Halls: </h1>
            @if(isset($data))
                <div class="d-flex justify-content-center w-100 mt-5">
                    <div class="list-group ms-auto me-auto w-75 d-flex">
                        {{-- ########### draw sectors ########## --}}
                        @foreach($data as $sector)
                            <div class="d-flex mt-3" style="
                                    flex-direction: row !important;
                                    justify-content: space-evenly;
                                    align-items: center;
                                ">
                                <a href="sectors/edit/{{ $sector->number }}" class="list-group-item list-group-item-action list-group-item-primary w-75 text-center rounded">
                                    Hall Number: {{ $sector->number }} , Rows: {{ $sector->rows }} , Seats: {{ $sector->seats }}
                                </a>
                                <div class="btn-group">
                                    <a href="sectors/edit/{{ $sector->number }}" class="btn btn-outline-success" style="font-size: 14px">Edit Hall</a>
                                    <a href="sectors/delete/{{ $sector->number }}" class="btn btn-outline-danger" style="font-size: 14px">Delete Hall</a>
                                </div>
                            </div>
                        @endforeach
                        {{-- ########### draw sectors ########## --}}
                    </div>
                </div>
            @else
                <div class="d-flex justify-content-center w-100 mt-5">
                    <h1 class="text-info">Sectors not added yet.</h1>
                </div>
            @endif
        </div>
{{--        <div class="w-25"> <!-- Right side menu -->--}}

{{--        </div>--}}
    </div>

@endsection
