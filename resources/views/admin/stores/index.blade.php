@extends('layouts.app')

@section('content')
<table class="table table-striped">
    <thead>
        <tr>
            <th>Opções</th>
            <th>Loja</th>
            <th>ID</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($stores as $store)
        <tr>
            <td>
                <div class="dropdown">
                    <a class="btn" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="fas fa-ellipsis-v"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ route('admin.stores.edit', ['store'=>$store->id]) }}" role="button">
                            <i class="fas fa-edit"></i>
                            <span>Editar</span>
                        </a>
                        <a class="dropdown-item text-danger" href="{{ route('admin.stores.destroy', ['store'=>$store->id]) }}"
                            role="button">
                            <i class="fas fa-trash"></i>
                            <span class="text-danger">Excluir</span>
                        </a>
                    </div>
                </div>
            </td>
            <td>{{ $store->name }}</td> {{--Print do Blade pro Id da loja--}}
            <td>{{ $store->id }}</td> {{--Print do Blade pro Id da loja--}}
        </tr>
        @endforeach
    </tbody>
</table>

<ul class="pagination justify-content-end">{{ $stores->links() }}</ul>

<a class="btn btn-primary" href="{{ route('admin.stores.create', ['store'=>$store->id]) }}" role="button">Criar Loja</a>

@endsection