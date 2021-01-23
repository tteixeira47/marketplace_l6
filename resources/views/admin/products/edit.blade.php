@extends('layouts.app')

@section('content')
<h1>Editar Produto</h1>
<form method="POST" action="{{ route('admin.products.update', ['product'=>$product->id]) }}">
    @csrf
    @method("PUT")

    <div class="form-group">
        <label>Nome Produto</label>
        <input class="form-control  @error('name') is-invalid @enderror" type="text" name="name"
            value="{{ $product->name }}">
        @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="form-group">
        <label>Descrição</label>
        <input class="form-control  @error('description') is-invalid @enderror" type="text" name="description"
            value="{{ $product->description }}">
        @error('description')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="form-group">
        <label>Conteúdo</label>
        <textarea class="form-control  @error('body') is-invalid @enderror" name="body">{{ $product->body }}</textarea>
        @error('body')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="form-group">
        <label>Preço</label>
        <input class="form-control  @error('price') is-invalid @enderror" type="text" name="price"
            value="{{ $product->price }}">
        @error('price')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="form-group">
        <label>Categorias</label>
        <select name="categories[]" class="form-control" multiple>
            @foreach ($categories as $category)
            <option value="{{ $category->id }}" @if($product->categories->contains($category)) selected @endif>
                {{ $category->name }}
            </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label>Slug</label>
        <input class="form-control" type="text" name="slug" value="{{ $product->slug }}">
    </div>

    <button type="submit" class="btn btn-success btn-lg">Atualizar Produto</button>

</form>
@endsection