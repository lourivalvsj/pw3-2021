@extends('admin.layout')

@section('title', 'Alteração de Diretor')

@section('page-title', 'Alteração de Diretor')

@section('content')
    <form method="post" action="{{route('directors.update',$director)}}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="description">name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{$director->name}}" required>
        </div>
        <div class="form-group">
            <input type="submit" value="Salvar" class="btn btn-success">
            <a href="{{route('directors.index')}}" class="btn btn-danger">Cancelar</a>
        </div>
    </form>
@endsection

