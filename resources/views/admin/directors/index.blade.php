@extends('admin.layout')

@section('title', 'Gerenciamento de Diretor')

@section('page-title', 'Gerenciamento de Diretor')

@section('content')
    <a href="{{route('directors.create')}}" class="btn btn-success">Novo Diretor</a>
    <table class="table table-hover">
        <thead>
        <tr>
            <th class="main-col">Diretor</th>
            <th>-</th>
        </tr>
        </thead>
        <tbody>
        @foreach($directors AS $director)
            <tr>
                <td class="main-col">{{$director->name}}</td>
                <td>
                    <a href="" class="btn btn-primary">Editar</a>
                    <a href="" class="btn btn-danger">Excluir</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

