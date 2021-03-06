@extends('layouts.app')

@section('content')

@if ($store)
<table class="table table-striped">
    <thead>
        <tr>
            <th>Opções</th>
            <th>Loja</th>
            <th>Total de Produtos</th>
            <th>ID</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <div class="dropdown">
                    <a class="btn" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="fas fa-ellipsis-v"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ route('admin.stores.edit', ['store'=>$store->id]) }}"
                            role="button">
                            <i class="fas fa-edit"></i>
                            <span>Editar</span>
                        </a>
                        <form action="{{ route('admin.stores.destroy', ['store'=>$store->id]) }}" method="POST">
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
            <td>{{ $store->name }}</td> {{--Print do Blade pro Id da loja--}}
            <td>{{ $store->products->count() }}</td> {{-- Exibir quantidade de produtos da loja --}}
            <td>{{ $store->id }}</td> {{--Print do Blade pro Id da loja--}}
        </tr>
    </tbody>
</table>

@else

<div class="container mt-5">
    <div class="row justify-content-md-center">
        <div class="col-md-auto">
            <a class="btn btn-primary" href="{{ route('admin.stores.create') }}" role="button">Criar Loja</a>
        </div>
    </div>
</div>

@endif

@endsection