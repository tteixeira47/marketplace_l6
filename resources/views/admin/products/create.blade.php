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
        <input class="form-control" type="text" name="description">
    </div>

    <div class="form-group">
        <label>Conteúdo</label>
        <textarea class="form-control" name="body" cols="30" rows="10"></textarea>
    </div>

    <div class="form-group">
        <label>Preço</label>
        <input class="form-control" type="text" name="price">
    </div>

    <div class="form-group">
        <label>Slug</label>
        <input class="form-control" type="text" name="slug">
    </div>

    <div class="form-group">
        <label>Loja</label>
        <select class="form-control" name="store">
            @foreach ($stores as $s)
            <option value="{{ $s->id }}">{{ $s->name }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-success btn-lg">Criar Produto</button>

</form>
@endsection