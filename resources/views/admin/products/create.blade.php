@extends('layouts.app')

@section('content')
<h1>Criar Produto</h1>
<form method="POST" action="{{ route('admin.products.store') }}">
    @csrf

    <div class="form-group">
        <label>Nome Produto</label>
        <input class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" type="text"
            name="name">
        @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="form-group">
        <label>Descrição</label>
        <input class="form-control @error('description') is-invalid @enderror" value="{{ old('description') }}"
            type="text" name="description">
        @error('description')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="form-group">
        <label>Conteúdo</label>
        <textarea class="form-control @error('body') is-invalid @enderror" name="body">{{ old('body') }}</textarea>
        @error('body')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="form-group">
        <label>Preço</label>
        <input class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}" type="text"
            name="price">
        @error('price')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="form-group">
        <label>Slug</label>
        <input class="form-control" type="text" name="slug">
    </div>

    <button type="submit" class="btn btn-success btn-lg">Criar Produto</button>

</form>
@endsection