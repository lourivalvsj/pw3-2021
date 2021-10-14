@extends('admin.layout')

@section('title', 'Cadastro de Language')

@section('page-title', 'Cadastro de Language')

@section('content')
    <form method="post" action="{{route('languages.store')}}">
        @csrf
        <div class="form-group">
            <label for="description">Descricao</label>
            <input type="text" name="description" id="description" class="form-control" required>
        </div>
        <div class="form-group">
            <input type="submit" value="Salvar" class="btn btn-success">
            <a href="{{route('languages.index')}}" class="btn btn-danger">Cancelar</a>
        </div>
    </form>
@endsection


