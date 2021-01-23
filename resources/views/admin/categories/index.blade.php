@extends('layouts.app')


@section('content')

<table class="table table-striped">
    <thead>
        <tr>
            <th>Ações</th>
            <th>Nome</th>
            <th>ID</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
        <tr>
            <td>
                <div class="dropdown">
                    <a class="btn" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="fas fa-ellipsis-v"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item"
                            href="{{ route('admin.categories.edit', ['category' => $category->id]) }}" role="button">
                            <i class="fas fa-edit"></i>
                            <span>Editar</span>
                        </a>
                        <form name="botaoRemover"
                            action="{{ route('admin.categories.destroy', ['category' => $category->id]) }}"
                            method="POST">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="dropdown-item text-danger">
                                <i class="fas fa-trash"></i>
                                <span class="text-danger">Excluir</span>
                            </button>
                        </form>
                    </div>
                </div>
            </td>
            <td>{{$category->name}}</td>
            <td>{{$category->id}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<a class="btn btn-primary" href="{{ route('admin.categories.create') }}" role="button">Criar Produto</a>

@endsection