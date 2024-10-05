@extends('layouts.app')

@section('content')
    <h1>Editar Produto</h1>
    <form action="{{ route('products.update', $product->id) }}" method="post">
        @csrf
        @method('PUT')
        <label for="name">Nome:</label>
        <input type="text" name="name" id="name" value="{{$product->name}}" required>
        <br>
        <label for="description">Descrição:</label>
        <textarea name="description" id="description">{{$product->description}}</textarea>
        <br>
        <label for="price">Preço:</label>

        <input type="number" step="0.01" name="price" id="price" value="{{$product->price}}" required>
        <br>
        <button type="submit">Salvar</button>
    </form>
@endsection


