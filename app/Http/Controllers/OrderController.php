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
    public function show($id){
        $session = Session::find($id)->first();

        return view('order.show',compact('session'));
    }
}
