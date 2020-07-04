@extends('admin.layouts.app')

@section('title', 'Gestão de Produtos')

@section('content')    
    <h1>Exibindo os Produtos</h1>    
    <a href="{{ route('products.create') }}" class="btn btn-primary">Cadastrar</a>

    <hr>

    <form class="form form-inline" action="{{ route('products.search') }}" method="POST">
        @csrf
        <input class="form-control" type="text" name="filter" placeholder="Filtrar:" id="" value="{{ $filters['filter'] ?? '' }}">
        <button class="btn btn-info" type="submit">Pesquisar</button>
    </form>

    <table class="table table-striped">
        <thead>
            <tr>
                <th width="100">Imagem</th>
                <th>Nome</th>
                <th>Preço</th>
                <th width="100">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>
                        @if ($product->image)
                            <img src="{{ url("storage/{$product->image}") }}" alt="{{ $product->name }}" style="max-width: 100px;">
                        @endif
                    </td>
                    <td scope="row">{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>
                        <a href="{{ route('products.edit', $product->id) }}">Editar</a>                    
                        <a href="{{ route('products.show', $product->id) }}">Detalhes</a>
                    </td>
                </tr>                
            @endforeach
        </tbody>
    </table>

    @if (isset($filters))
        {!! $products->appends($filters)->links() !!}        
    @else        
        {!! $products->links() !!}
    @endif

@endsection