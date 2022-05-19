<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\MovieCategories;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::orderBy('created_at', 'desc')->get();
        return view ('admin.movies.index',compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.movies.create');
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
            'movie_name' => 'required',
            'movie_description' => 'required|min:50',
            'movie_thumbnail' => 'required',
            'movie_trailer' => 'required',
            'movie_duration' => 'required',
            'movie_date' => 'required',
        ]);

        $movie = new Movie();
        $movie->movie_name = $request->movie_name;
        $movie->movie_description = $request->movie_description;
        $movie->movie_thumbnail = $request->movie_thumbnail;
        $movie->movie_trailer = $request->movie_trailer;
        $movie->movie_duration = $request->movie_duration;
        $movie->movie_release_date = $request->movie_date;
        $movie->created_at = now();
        $movie->updated_at = now();
        $movie->save();

        return redirect()->route('movies')->with('success', 'Movie created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        function convertToHoursMins($time, $format = '%2d:%02d') {
            if ($time < 1) {
                return;
            }
            $hours = floor($time / 60);
            $minutes = ($time % 60);
            return sprintf($format, $hours, $minutes);
        }

        $movie = Movie::find($id);
        $time = convertToHoursMins($movie->movie_duration);

        return view('admin.movies.show', compact('movie', 'time'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movie = Movie::find($id);
        return view('admin.movies.edit', compact('movie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'movie_name' => 'required',
            'movie_description' => 'required|min:50',
            'movie_thumbnail' => 'required',
            'movie_trailer' => 'required',
            'movie_duration' => 'required',
            'movie_date' => 'required',
        ]);

        $movie = Movie::find($id);
        $movie->movie_name = $request->movie_name;
        $movie->movie_description = $request->movie_description;
        $movie->movie_thumbnail = $request->movie_thumbnail;
        $movie->movie_trailer = $request->movie_trailer;
        $movie->movie_duration = $request->movie_duration;
        $movie->movie_release_date = $request->movie_date;
        $movie->updated_at = now();
        $movie->save();

        $categoryNum = $request->numberOfCategories;

        if (intval($categoryNum) > 0){
            return view('admin.movies.addCategory', compact('movie', 'categoryNum'));
        }else {
            return redirect()->route('movies')->with('success', 'Movie updated successfully');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::find($id);
        $movie->delete();
        return redirect()->route('movies')->with('success', 'Movie deleted successfully');
    }

    public function storeCategory($id, Request $request){
//        dd($request->all());

        $categories = [];
        for ($i = 1; $i <= $request->num; $i++){
            if ($request->isNotFilled('category#'.$i)){

            }else{
                array_push($categories, $request->input('category#'.$i));
            }
        }
        foreach ($categories as $category){
            $movieCategory = new MovieCategories();
            $movieCategory->movie_id = $id;
            $movieCategory->category = $category;
            $movieCategory->save();
        }
//        return redirect()->route('/movie/show/', $id)->with('success', 'Category added successfully');
        return redirect()->route('showMovie',$id)->with('success', 'Category added successfully');
    }

    public function deleteCategory($id){
        $category = MovieCategories::find($id);
        $category->delete();
//        return redirect()->route('/movie/show/', $category->movie_id)->with('success', 'Category deleted successfully');
        return redirect()->route('showMovie',$category->movie_id)->with('success', 'Category deleted successfully');
    }
}
