<?php

namespace App\Http\Controllers;

use App\Models\Sector;
use Illuminate\Http\Request;

class SectorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $data = Sector::get()->first()->session->map(function ($session){
//            return $session->movie;
//        });
//        return view('pages.index',compact('data'));
        $data = Sector::all();
        return view('admin.sectors',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add_sector');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Sector::where('number',$request->number)->exists()){
            return redirect()->back()->with('error','Sector already exists');
        }else {
            $request->validate([
                'number' => 'required',
                'seats' => 'required',
                'rows' => 'required',
            ]);

            $sector = new Sector();
            $sector->number = $request->number;
            $sector->seats = $request->seats;
            $sector->rows = $request->rows;
            $sector->created_at = now();
            $sector->updated_at = now();
            $sector->save();

            return redirect()->route('sectors')->with('success', 'Sector created successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Sector::where('number',$id)->first();
        return view('admin.edit_sector',compact('data'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
            $request->validate([
                'seats'=>'required',
                'rows'=>'required'
            ]);
            $data = Sector::where('number',$id)->first();

            $data->seats = $request->seats;
            $data->rows = $request->rows;
            $data->updated_at = date('Y-m-d H:i:s');

            $data->save();
            return redirect()->route('sectors')->with('success','Hall edited successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sector  $sector
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Sector::where('number',$id)->delete();
        return  redirect()->route('sectors')->with('success','Successfully deleted.');
    }
}
