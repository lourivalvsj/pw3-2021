@extends('admin.layout')

@section('title', 'Gerenciamento de Idimas')

@section('page-title', 'Gerenciamento de Idiomas')

@section('content')
    <a href="{{route('languages.create')}}" class="btn btn-success">Novo Idioma</a>
    <table class="table table-hover">
        <thead>
        <tr>
            <th class="main-col">Idioma </th>
            <th>-</th>
        </tr>
        </thead>
        <tbody>
        @foreach($languages AS $language)
            <tr>
                <td class="main-col">{{$language->description}}</td>
                <td>
                    <a href="{{route('languages.edit', $language->id)}}" class="btn btn-primary">Editar</a>
                    <form method="post" action="{{route('languages.destroy', $language->id)}}" style="display: inline">
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
