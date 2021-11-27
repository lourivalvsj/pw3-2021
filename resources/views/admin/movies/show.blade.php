@extends('admin.layout')

@section('title', 'Gerenciamento de Filmes')

@section('page-title', 'Visualizacao de Filme')

@section('content')
    <div class="card mb-3" style="max-width: 100%;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{\Illuminate\Support\Facades\Storage::url('movies/').$movie->cover}}" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{$movie->title}}</h5>
                    <p class="card-text"><strong>Sinopse:</strong> {{$movie->synopsis}}</p>
                    <p class="card-text"><strong>Ano:</strong> {{$movie->year}}</p>
                    <p class="card-text"><strong>Duracao:</strong> {{$movie->time}}</p>
                    <p class="card-text"><strong>Trailer:</strong> <a href="{{$movie->trailer}}" target="_blank">Asista aqui</a></p>
                    <p class="card-text"><strong>Pais:</strong> {{$movie->country->name}}</p>
                    <p class="card-text"><strong>Genero:</strong> {{$movie->genre->description}}</p>
                    <p class="card-text"><strong>Diretor:</strong> {{$movie->director->name}}</p>
                    <a href="{{route('movies.index')}}" class="btn btn-primary">Voltar</a>
                </div>
            </div>
        </div>
    </div>
@endsection
