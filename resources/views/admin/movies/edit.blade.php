@extends('admin.layout')

@section('title', 'Alteracao de Filmes')

@section('page-title', 'Alteracao de Filmes')

@section('content')
    <form method="post" action="{{route('movies.update', $movie)}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Titulo</label>
            <input type="text" name="title" id="title" class="form-control" value="{{$movie->title}}" required>
        </div>
        <div class="form-group">
            <label for="cover">Capa</label>
            <input type="file" name="cover" id="cover" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="trailer">Trailer</label>
            <input type="text" name="trailer" id="trailer" class="form-control" value="{{$movie->trailer}}" required>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-6">
                    <label for="year">Ano</label>
                    <input type="number" name="year" id="year" class="form-control" value="{{$movie->year}}" required>
                </div>
                <div class="col-6">
                    <label for="time">Duracao (min)</label>
                    <input type="number" name="time" id="time" class="form-control" value="{{$movie->time}}" required>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="country">Pais</label>
            <select name="country_id" id="country" class="form-control">
                <option value="0">Escolha um pais</option>
                @foreach($countries as $country)
                    @if($movie->country->id == $country->id)
                        <option value="{{$country->id}}" selected="true">{{$country->name}}</option>
                    @else
                        <option value="{{$country->id}}">{{$country->name}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="genre">Genero</label>
            <select name="genre_id" id="genre" class="form-control">
                <option value="0">Escolha um genero</option>
                @foreach($genres as $genre)
                    @if($movie->genre->id == $genre->id)
                        <option value="{{$genre->id}}" selected="true">{{$genre->description}}</option>
                    @else
                        <option value="{{$genre->id}}">{{$genre->description}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="director">Diretor</label>
            <select name="director_id" id="director" class="form-control">
                <option value="0">Escolha um diretor</option>
                @foreach($directors as $director)
                    @if($movie->director->id == $director->id)
                        <option value="{{$director->id}}" selected="true">{{$director->name}}</option>
                    @else
                        <option value="{{$director->id}}">{{$director->name}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="synopsis">Sinopse</label>
            <textarea name="synopsis" id="synopsis" cols="30" rows="10" class="form-control">{{$movie->synopsis}}</textarea>
        </div>
        <div class="form-group">
            <input type="submit" value="Salvar" class="btn btn-success">
            <a href="{{route('movies.index')}}" class="btn btn-danger">Cancelar</a>
        </div>
    </form>
@endsection
