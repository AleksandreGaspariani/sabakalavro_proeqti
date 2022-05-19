<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cards.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'card_name' => 'required',
            'owner_name' => 'required',
            'owner_lastname' => 'required',
            'card_number' => 'required|numeric|digits:16',
            'card_expiry' => 'required',
            'card_cvv' => 'required|numeric|digits:3',
        ]);

        $card = new Card();
        $card->user_id = Auth()->user()->id;
        $card->card_name = $request->input('card_name');
        $card->owner_name = $request->input('owner_name');
        $card->owner_surname = $request->input('owner_lastname');
        $card->card_number = $request->input('card_number');
        $card->card_expiry = $request->input('card_expiry');
        $card->card_cvv = $request->input('card_cvv');
        $card->save();

        return redirect('/home')->with('success', 'Card Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function show(Card $card)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function edit(Card $card)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Card $card)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function destroy(Card $card)
    {
        //
    }
}
