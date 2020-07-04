@extends('admin.layouts.app')

@section('title', 'Cadastrar Novo Produto')

@section('content')
    <h1>Cadastrar Novo Produto</h1>    

    <form class="form" action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
        @include('admin.pages.products._partials.form')
    </form>
    
    <a class="btn btn-danger" href="{{ route('products.index') }}">Voltar</a>
@endsection