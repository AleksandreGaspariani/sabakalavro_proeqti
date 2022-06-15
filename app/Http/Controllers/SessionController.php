<?php

namespace App\Http\Controllers;

use App\Models\Sector;
use App\Models\Session;
use App\Models\Movie;
use Dotenv\Validator;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sessions = Session::all()->sortBy('start_at');

        return view('session.index', compact('sessions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $movies = Movie::all();
        $halls = Sector::all();
        return view('session.create', compact('movies', 'halls'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        function convertToHoursMins($time, $format = '%2d:%02d')
        {
            if ($time < 1) {
                return;
            }
            $hours = floor($time / 60);
            $minutes = ($time % 60);
            return sprintf($format, $hours, $minutes);
        }

        $validData = $request->validate([
            'sector_id' => 'required',
            'movie_id' => 'required',
            'start_at' => 'required',
            'price' => 'required|numeric',
            'language' => 'required',
        ]);

        $session = new Session();

        $movie = Movie::find($validData['movie_id']);

//        End at is calculated by adding the duration of the movie to the start at
        $movie_duration = convertToHoursMins($movie->movie_duration);
        $explodedDate = explode(':', $movie_duration);
//        $explodedDate[0] = hours and $explodedDate[1] = minutes
//        Explode the start at to get the hours and minutes
        $explodedStartAt = explode('T', $request->start_at);
//        $start = "$explodedStartAt[0] $explodedStartAt[1]";

        $start = date('Y-m-d H:i:s', strtotime($explodedStartAt[0] . ' ' . $explodedStartAt[1]));

//        $time = $start->addHours($explodedDate[0])->addMinutes($explodedDate[1])->addSeconds(59);
        $time = date('Y-m-d H:i:s', strtotime('+' . $explodedDate[0] . ' hours +' . $explodedDate[1] . ' minutes' . ' +59 seconds', strtotime($start)));
        $end_at = $time;

//      Store the session
        $session->sector_id = $validData['sector_id'];
        $session->movie_id = $validData['movie_id'];
        $session->start_at = $start;
        $session->end_at = $end_at;
        $session->language = $validData['language'];
        $session->price = $validData['price'];
//        Save the session
        $session->save();

        return redirect()->route('sessions_list')->with('success', 'Session added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie = Movie::find($id);

        return view('session.show', compact('movie'));
    }


    public function AjaxDateFilter(Request $request)
    {
        $session = Session::whereDate('start_at', '=', date('y-m-d', strtotime($request->date)))
            ->where('movie_id','=',$request->movieID)->get();
        return response()->json($session, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
