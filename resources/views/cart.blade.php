@extends('layouts.front')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h2 class="mb-5">Carrinho de Compras</h2>
        </div>
        <div class="col-12">
            @if ($cart)
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Preço</th>
                        <th>Qtde</th>
                        <th>Subtotal</th>
                        <th class="text-center">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp

                    @foreach ($cart as $c)
                    <tr>
                        <td scope="row">{{ $c['name'] }}</td>

                        <td>R$ {{ number_format($c['price'], 2, ',', '.') }}</td>

                        <td>{{ $c['amount'] }}</td>

                        @php
                        $subtotal = $c['price'] * $c['amount'];
                        $total += $subtotal;
                        @endphp

                        <td>R$ {{ number_format($subtotal, 2, ',', '.') }}</td>

                        <td class="text-center">
                            <a class="text-danger" href="{{ route('cart.remove', ['slug' => $c['slug']]) }}"
                                role="button">
                                <i class="fa fa-window-close" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="3" class="font-weight-bold">Total:</td>
                        <td colspan="2" class="font-weight-bold">R$ {{ number_format($total, 2, ',', '.') }}</td>
                    </tr>
                </tbody>
            </table>
            <hr class="mb-3">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-3 text-left">
                        <a class="btn btn-sm btn-danger" href="{{ route('cart.cancel') }}" role="button">Limpar carrinho</a>
                    </div>
                    <div class="col-md-3 offset-md-6 text-right">
                        <a class="btn btn-lg btn-success" href="#" role="button">Seguir ao pagamento</a>
                    </div>
                </div>
            </div>
            @else
            <div class="alert alert-warning">O carrinho está vazio</div>
            @endif
        </div>
    </div>
</div>

@endsection