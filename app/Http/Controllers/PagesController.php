<?php

namespace App\Http\Controllers;

use App\Models\MovieCategories;
use App\Models\Sector;
use App\Models\Movie;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    function index(){
        $todayMovies = Movie::today()->get();
        $upcomingMovies = Movie::upcoming()->get();

//========== Georgian movies down below.=========================
        $category = MovieCategories::where('category', '=', 'GEO')->get();
        $geo = [];
        foreach ($category as $cat) {
            $geo[] = $cat->movie_id;
        }
        $geoMovies = Movie::whereIn('id', $geo)->get();
// ==========================================================


        return view('pages.index',compact('todayMovies','upcomingMovies','geoMovies'));
    }
    function login(){
        return view('auth.login');
    }
    function register(){
        return view('auth.register');
    }


}
