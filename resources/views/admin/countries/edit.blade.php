@extends('admin.layout')

@section('title', 'Alteracao de Paises')

@section('page-title', 'Alteracao de Paises')

@section('content')
    <form method="post" action="{{route('countries.update', $country)}}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" name="name" id="name" class="form-control" required value="{{$country->name}}">
        </div>
        <div class="form-group">
            <label for="initials">Sigla</label>
            <input type="text" name="initials" id="initials" class="form-control" maxlength="3" required value="{{$country->initials}}">
        </div>
        <div class="form-group">
            <label for="language">Idioma</label>
            <select name="language_id" id="language" class="form-control">
                <option value="0">Escolha um idioma</option>
                @foreach($languages as $language)
                    @if($country->language->description == $language->description)
                        <option value="{{$language->id}}" selected="true">{{$language->description}}</option>
                    @else
                        <option value="{{$language->id}}">{{$language->description}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <input type="submit" value="Salvar" class="btn btn-success">
            <a href="{{route('countries.index')}}" class="btn btn-danger">Cancelar</a>
        </div>
    </form>
@endsection
