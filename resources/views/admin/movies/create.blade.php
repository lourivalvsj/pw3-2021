@extends('admin.layout')

@section('title', 'Cadastro de Filmes')

@section('page-title', 'Cadastro de Filmes')

@section('content')
    <form method="post" action="{{route('movies.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Titulo</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="cover">Capa</label>
            <input type="file" name="cover" id="cover" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="trailer">Trailer</label>
            <input type="text" name="trailer" id="trailer" class="form-control" required>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-6">
                    <label for="year">Ano</label>
                    <input type="number" name="year" id="year" class="form-control" required>
                </div>
                <div class="col-6">
                    <label for="time">Duracao (min)</label>
                    <input type="number" name="time" id="time" class="form-control" required>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="country">Pais</label>
            <select name="country_id" id="country" class="form-control">
                <option value="0">Escolha um pais</option>
                @foreach($countries as $country)
                    <option value="{{$country->id}}">{{$country->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="genre">Genero</label>
            <select name="genre_id" id="genre" class="form-control">
                <option value="0">Escolha um genero</option>
                @foreach($genres as $genre)
                    <option value="{{$genre->id}}">{{$genre->description}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="director">Diretor</label>
            <select name="director_id" id="director" class="form-control">
                <option value="0">Escolha um diretor</option>
                @foreach($directors as $director)
                    <option value="{{$director->id}}">{{$director->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="synopsis">Sinopse</label>
            <textarea name="synopsis" id="synopsis" cols="30" rows="10" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <input type="submit" value="Salvar" class="btn btn-success">
            <a href="{{route('movies.index')}}" class="btn btn-danger">Cancelar</a>
        </div>
    </form>
@endsection
