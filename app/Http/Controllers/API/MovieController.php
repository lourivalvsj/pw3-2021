<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function allMovies(){
        $movies = Movie::all();
        return json_encode($movies, JSON_UNESCAPED_UNICODE);
    }

    public function getMovie($id){
        $movie = Movie::findOrFail($id);
        if ($movie){
            return json_encode($movie, JSON_UNESCAPED_UNICODE);
        }
        return abort(404);
    }
}
