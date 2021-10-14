@extends('admin.layout')

@section('title', 'Gerenciamento de Languages')

@section('page-title', 'Gerenciamento de Languages')

@section('content')
    <a href="{{route('languages.create')}}" class="btn btn-success">Novo Language</a>
    <table class="table table-hover">
        <thead>
        <tr>
            <th class="main-col">Language</th>
            <th>-</th>
        </tr>
        </thead>
        <tbody>
        @foreach($languages AS $language)
            <tr>
                <td class="main-col">{{$language->description}}</td>
                <td>
                    <a href="" class="btn btn-primary">Editar</a>
                    <a href="" class="btn btn-danger">Excluir</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
