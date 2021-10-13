@extends('admin.layout')

@section('title', 'Gerenciamento de Generos')

@section('page-title', 'Gerenciamento de Generos')

@section('content')
    <a href="{{route('genres.create')}}" class="btn btn-success">Novo genero</a>
    <table class="table table-hover">
        <thead>
        <tr>
            <th class="main-col">Genero</th>
            <th>-</th>
        </tr>
        </thead>
        <tbody>
        @foreach($genres AS $genre)
            <tr>
                <td class="main-col">{{$genre->description}}</td>
                <td>
                    <a href="" class="btn btn-primary">Editar</a>
                    <a href="" class="btn btn-danger">Excluir</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
