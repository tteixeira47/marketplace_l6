@extends('layouts.app')

@section('content')
<h1>Editar Produto</h1>
<form method="POST" action="{{ route('admin.products.update', ['product'=>$product->id]) }}">
    @csrf
    @method("PUT")

    <div class="form-group">
        <label>Nome Produto</label>
        <input class="form-control" type="text" name="name" value="{{ $product->name }}">
    </div>

    <div class="form-group">
        <label>Descrição</label>
        <input class="form-control" type="text" name="description" value="{{ $product->description }}">
    </div>

    <div class="form-group">
        <label>Conteúdo</label>
        <textarea class="form-control" name="body">{{ $product->body }}</textarea>
    </div>

    <div class="form-group">
        <label>Preço</label>
        <input class="form-control" type="text" name="price" value="{{ $product->price }}">
    </div>

    <div class="form-group">
        <label>Slug</label>
        <input class="form-control" type="text" name="slug" value="{{ $product->slug }}">
    </div>

    <button type="submit" class="btn btn-success btn-lg">Atualizar Produto</button>

</form>
@endsection