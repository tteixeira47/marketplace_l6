@extends('layouts.app')

@section('content')
<table class="table table-striped">
    <thead>
        <tr>
            <th>Opções</th>
            <th>Produto</th>
            <th>Preço</th>
            <th>ID</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $p)
        <tr>
            <td>
                <div class="dropdown">
                    <a class="btn" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="fas fa-ellipsis-v"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ route('products.edit', ['product'=>$p->id]) }}" role="button">
                            <i class="fas fa-edit"></i>
                            <span>Editar</span>
                        </a>
                        <a class="dropdown-item text-danger" href="#" role="button">
                            <i class="fas fa-trash"></i>
                            <span class="text-danger">Excluir</span>
                        </a>
                    </div>
                </div>
            </td>
            <td>{{ $p->name }}</td> {{--Print do Blade pro Id da loja--}}
            <td>R$ {{ number_format($p->price, 2, ',', '.') }}</td>
            <td>{{ $p->id }}</td> {{--Print do Blade pro Id da loja--}}
        </tr>
        @endforeach
    </tbody>
</table>

<ul class="pagination justify-content-end">{{ $products->links() }}</ul>

<a class="btn btn-primary" href="{{ route('products.create') }}" role="button">Criar Produto</a>

@endsection