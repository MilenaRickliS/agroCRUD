@extends('layouts.app')

    @section('content')
    <h1>Lista de Produtos</h1>
    @foreach ($products as $product)
        <div>
            <h2>{{ $product->name }}</h2>
            <p>{{ $product->description }}</p>
            <p>R$ {{ number_format($product->price, 2, ',', '.') }}</p>

            <a href="{{ route('products.edit', $product->id) }}">Editar Produto</a>
            <form action="{{ route('products.destroy', $product->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit">Excluir Produto</button>
            </form>
        </div>

        
    @endforeach
    <a href="{{ route('products.create') }}">Criar Produto</a>
@endsection