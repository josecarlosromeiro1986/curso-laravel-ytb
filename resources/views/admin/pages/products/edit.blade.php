@extends('admin.layouts.app')

@section('title', 'Editar Produto')

@section('content')
    <h1>Editar Produto {{ $id }}</h1>

    <form action="{{ route('products.update', $id) }}" method="post">
        @method('PUT')
        @csrf
        <input type="text" name="name" id="" placeholder="Nome:">
        <input type="text" name="description" id="" placeholder="Descrição:">
        <button type="submit">Enviar</button>
    </form>
    
    <a href="{{ route('products.index') }}">Voltar</a>
@endsection