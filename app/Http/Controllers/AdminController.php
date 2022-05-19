<?php

namespace App\Http\Controllers;

use App\Models\Sector;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;


class AdminController extends Controller
{
    public function sectors(){
        $data = Sector::all();
        return view('admin.sectors',compact('data'));
    }

    public function add_sector(){
        return view('admin.add_sector');
    }

    public function store_sector(Request $request){

        if (Sector::where('number','=',$request->number)->count()>0){
            return redirect('/sectors')->with('error','Hall with this number already exist');
        }else{
            $data = [
                'number' => $request->number,
                'seats' => $request->seats,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];

            Sector::insert($data);
            return redirect('/sectors')->with('success','Hall added successfully.');
        }
    }

    public function edit_sector($number){
        $data = Sector::where('number',$number)->first();
        return view('admin.edit_sector',compact('data'));
    }

    public function update_sector(Request $request, $number){

//        if (Sector::where('number',$request->number)->count() > 0){
//            return redirect()->route('sectors')->with('error','Hall with this number is already exist');
//        }else{
            $request->validate([
                'number'=>'required',
                'seats'=>'required'
            ]);

            $data = Sector::where('number','=',$request->number)->first();

            $data->number = $request->number;
            $data->seats = $request->seats;
            $data->updated_at = date('Y-m-d H:i:s');

            $data->save();
            return redirect()->route('sectors')->with('success','Hall edited successfully');
        }
//    }


}
