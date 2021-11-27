@extends('admin.layout')

@section('title', 'Gerenciamento de Filmes')

@section('page-title', 'Gerenciamento de Filmes')

@section('content')
    @if(\Illuminate\Support\Facades\Session::has('message'))
        <div class="alert alert-success" role="alert">
            {{\Illuminate\Support\Facades\Session::get('message')}}
        </div>
    @endif
    <a href="{{route('movies.create')}}" class="btn btn-success">Novo Filme</a>
    <table class="table table-hover">
        <thead>
        <tr>
            <th class="col-50">Titulo</th>
            <th>Genero</th>
            <th>Diretor</th>
            <th>-</th>
        </tr>
        </thead>
        <tbody>
        @foreach($movies AS $movie)
            <tr>
                <td class="col-50">{{$movie->title}}</td>
                <td>{{$movie->genre->description}}</td>
                <td>{{$movie->director->name}}</td>
                <td>
                    <a href="{{route('movies.show', $movie)}}" class="btn btn-dark">Exibir</a>
                    <a href="{{route('movies.edit', $movie)}}" class="btn btn-primary">Editar</a>
                    <form method="post" action="{{route('movies.destroy', $movie)}}" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Excluir</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
