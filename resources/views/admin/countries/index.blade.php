@extends('admin.layout')

@section('title', 'Gerenciamento de Paises')

@section('page-title', 'Gerenciamento de Paises')

@section('content')
    <a href="{{route('countries.create')}}" class="btn btn-success">Novo Pais</a>
    <table class="table table-hover">
        <thead>
        <tr>
            <th class="col-50">Pais</th>
            <th>Sigla</th>
            <th>Genero</th>
            <th>-</th>
        </tr>
        </thead>
        <tbody>
        @foreach($countries AS $country)
            <tr>
                <td class="col-50">{{$country->name}}</td>
                <td>{{$country->initials}}</td>
                <td>{{$country->language->description}}</td>
                <td>
                    <a href="{{route('countries.edit', $country)}}" class="btn btn-primary">Editar</a>
                    <form method="post" action="{{route('countries.destroy', $country)}}" style="display: inline">
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

