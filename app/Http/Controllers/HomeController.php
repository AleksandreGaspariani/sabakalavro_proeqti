<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Card;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

//        $card_number = $card->card_number;
//        $card_number = substr($card_number, -4);

        return view('home');
    }
}
