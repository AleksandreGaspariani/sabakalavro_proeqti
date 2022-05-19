<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Sector;
use App\Models\Session;
use App\Models\Movie;
use App\Models\User;

class OrderController extends Controller
{
    public function checkForTicket($id){
        $ticket = Movie::where('id', $id)->first();
        $sessions = Session::where('movie_id', $id)->get();

        $ticket = 'test';
        $session = 'session';

        return view('pages.ticket', compact('ticket', 'sessions'));
    }
}
