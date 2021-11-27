<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Director;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::all();
        return view('admin.movies.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        $genres = Genre::all();
        $directors = Director::all();
        return view('admin.movies.create', compact('countries', 'genres', 'directors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Movie::create($request->all());
        $nameFile = null;
        if ($request->hasFile('cover') && $request->file('cover')->isValid()){
            $name = uniqid(date('HisYmd'));
            $extesion = $request->cover->extension();
            $nameFile = "{$name}.{$extesion}";
            $upload = $request->cover->storeAs('public/movies', $nameFile);
            if(!$upload){
                return redirect()
                    ->back()
                    ->with('error','Falha ao fazer upload')
                    ->withInput();
            }else{
                Movie::create([
                    'title' => $request->title,
                    'synopsis' => $request->synopsis,
                    'year' => $request->year,
                    'trailer' => $request->trailer,
                    'time' => $request->time,
                    'cover' => $nameFile,
                    'country_id' => $request->country_id,
                    'genre_id' => $request->genre_id,
                    'director_id' => $request->director_id
                ]);
                return redirect()->route('movies.index');
            }
        }
        //return $request->file('cover')->isValid();
        //return redirect()->route('movies.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        return view('admin.movies.show', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        $countries = Country::all();
        $genres = Genre::all();
        $directors = Director::all();
        return view('admin.movies.edit', compact('countries', 'genres', 'directors', 'movie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        //se for enviado algum arquivo de capa pelo formulario entao deve-se excluir o arquivo no servidor, fazer o upload do novo arquivo e atualizar os dados no banco
        //caso nao seja enviado um novo arquivo de capa somente atualize os dados do banco.
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        $image_path = storage_path('app/public/movies/').$movie->cover;
        unlink($image_path);
        $movie->delete();
        return redirect()->route('movies.index')->with('message', 'Registro excluido com sucesso');
    }
}
