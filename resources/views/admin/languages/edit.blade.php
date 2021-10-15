@extends('admin.layout')

@section('title', 'Alteração de Idioma')

@section('page-title', 'Alteração de Idioma')

@section('content')
    <form method="post" action="{{route('languages.update',$language->id)}}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="description">Descricao</label>
            <input type="text" name="description" id="description" class="form-control" value="{{$language->description}}" required>
        </div>
        <div class="form-group">
            <input type="submit" value="Salvar" class="btn btn-success">
            <a href="{{route('languages.index')}}" class="btn btn-danger">Cancelar</a>
        </div>
    </form>
@endsection

