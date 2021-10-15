@extends('admin.layout')

@section('title', 'Alteração de Generos')

@section('page-title', 'Alteração de Generos')

@section('content')
    <form method="post" action="{{route('genres.update',$genre)}}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="description">Descricao</label>
            <input type="text" name="description" id="description" class="form-control" value="{{$genre->description}}" required>
        </div>
        <div class="form-group">
            <input type="submit" value="Salvar" class="btn btn-success">
            <a href="{{route('genres.index')}}" class="btn btn-danger">Cancelar</a>
        </div>
    </form>
@endsection

