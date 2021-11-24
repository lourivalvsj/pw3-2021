extends('admin.layout')
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
                    <a href="{{route('genres.edit', $genre->id)}}" class="btn btn-primary">Editar</a>
                    <form method="post" action="{{route('genres.destroy', $genre)}}" style="display: inline">
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
