@extends('layouts.front')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h2>{{ $product->name }}</h2>
            <h3>R$ {{ number_format($product->price, '2', ',', '.') }}</h3>
            <span>Loja: {{ $product->store->name}}</span>
        </div>
        <div class="col-md-4 product-add">

            <form action="{{ route('cart.add') }}" method="POST">
                @csrf

                <div class="form-group">
                    <input type="hidden" name="product[name]" value="{{ $product->name }}">
                    <input type="hidden" name="product[price]" value="{{ $product->price }}">
                    <input type="hidden" name="product[slug]" value="{{ $product->slug }}">

                    <label for="">Quantidade</label>
                    <input type="number" name="product[amount]" id="" class="form-control col-md-4" value="1">
                </div>

                <button type="submit" class="btn btn-lg btn-primary">Comprar</button>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <hr>
            <p>{{ $product->description }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <a class="btn btn-dark" href="{{ route('home') }}" role="button">Voltar</a>
        </div>
    </div>
</div>


@endsection