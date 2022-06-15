<?php

namespace App\Http\Controllers;

use App\Models\MovieCategories;
use App\Models\Sector;
use App\Models\Movie;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    function index(){
        $todayMovies = Movie::today()->paginate(12);
        $upcomingMovies = Movie::upcoming()->paginate(12);

//========== Georgian movies down below.=========================
        $category = MovieCategories::where('category', '=', 'GEO')->paginate(12);
        $geo = [];
        foreach ($category as $cat) {
            $geo[] = $cat->movie_id;
        }
        $geoMovies = Movie::whereIn('id', $geo)->paginate(12);
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
