@extends('admin.layouts.app')

@section('title', 'Cadastrar Novo Produto')

@section('content')
    <h1>Cadastrar Novo Produto</h1>

    <form action="{{ route('products.store') }}" method="post">
        @csrf
        <input type="text" name="name" id="" placeholder="Nome:">
        <input type="text" name="description" id="" placeholder="Descrição:">
        <button type="submit">Enviar</button>
    </form>
    
    <a href="{{ route('products.index') }}">Voltar</a>
@endsection