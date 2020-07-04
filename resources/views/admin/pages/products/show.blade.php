@extends('admin.layouts.app')

@section('title', 'Produto')

@section('content')

    <h1>Produto {{ $product->name }}</h1>
    
    <ul>
        <li><strong>Nome:</strong>{{ $product->name }}</li>
        <li><strong>Preço:</strong>{{ $product->price }}</li>
        <li><strong>Descrição:</strong>{{ $product->description }}</li>        
        <img src="{{ url("storage/{$product->image}") }}" alt="{{ $product->name }}">
    </ul>

    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger" type="submit">Deletar o produto: {{ $product->name }}</button>
    </form>
    
    <a href="{{ route('products.index') }}">Voltar</a>

@endsection