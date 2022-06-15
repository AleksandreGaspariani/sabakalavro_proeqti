@extends('layouts.app')

@section('content')
    <div class="d-flex flex-column justify-content-center bg-dark w-100">
        <div class="w-100 d-flex flex-row justify-content-evenly align-items-center">
            <h1 class="text-white-50">Session Manipulations</h1>
            <a href="/session/add" class="btn btn-outline-light m-3" style="padding: 1.2rem 2rem">
                Add Session
            </a>
        </div>
        <div class="d-flex flex-column justify-content-center">


            <table class="table table-dark table-striped table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Movie</th>
                    <th scope="col">Sector</th>
                    <th scope="col">Date</th>
                    <th scope="col">Start At</th>
                    <th scope="col">And at</th>
                    <th scope="col">Language</th>
                    <th scope="col">Price</th>
                    <th scope="col" class="text-center">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($sessions as $session)
                    <tr>
                        <th scope="row">{{ $session->id }}</th>
                        <td>{{ $session->movie->movie_name }}</td>  // movie name
                        <td>{{ $session->sector->number }}</td>  // sector number
                        <td>{{ date('F j, Y',strtotime($session->start_at)) }}</td>  // date
                        <td>{{ date("F j, Y, g:i a",strtotime($session->start_at))   }}</td>  // date
                        <td>{{ date("F j, Y, g:i a",strtotime($session->end_at)) }}</td> // time
                        <td>{{ $session->language }}</td> // language
                        <td>{{ $session->price }}</td>  // ticket price
                        <td>
                            <div class="d-flex flex-row justify-content-evenly align-items-center">
                                <div>
                                    <a href="/sessions/{{ $session->id }}/edit" class="btn btn-outline-light m-1" style="padding: 0.5rem 1rem">Edit</a>
                                </div>
                                <div>
                                    <form action="/sessions/{{ $session->id }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-light m-1" style="padding: 0.5rem 1rem">Delete</button>
                                    </form>
                                </div>
                            </div>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
