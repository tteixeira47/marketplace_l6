@extends('layouts.front')

@section('content')
<div class="container">
    <div class="row">
        @foreach ($products as $p)
        <div class="col-md-6">
            <div class="card mb-3 bg-dark text-white">
                <div class="card-body">
                    <h2 class="card-title">{{ $p->name }}</h2>
                    <h4 class="card-title">R$ {{ number_format($p->price, '2', ',', '.') }}</h4>
                    <p class="card-text">{{ $p->description }}</p>
                    <a href="{{ route('product.single', ['slug' => $p->slug]) }}" class="btn btn-light">Ver Produto</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection