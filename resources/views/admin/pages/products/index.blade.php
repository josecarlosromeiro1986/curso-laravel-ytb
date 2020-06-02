@extends('admin.layouts.app')

@section('title', 'Products')

@section('content')    
    <h1>Exibindo os Produtos</h1>

    <a href="{{ route('products.create') }}">Cadastrar</a>

    <hr>

    @component('admin.components.card')
    @slot('title')
        <h1>Título Card</h1>
    @endslot
        Um card de exemplo
    @endcomponent

    <hr>

    @include('admin.includes.alerts', ['content' => 'Alerta de preços de produtos'])

    <hr>

    @if (isset($products))    
        @foreach ($products as $product)
            <p class="@if ($loop->last) last @endif">{{ $product }}</p>
        @endforeach
    @endif

    <hr>

    @forelse ($products as $product)
        <p class="@if ($loop->first) last @endif">{{ $product }}</p>
    @empty
        <p>Não</p>
    @endforelse

    <hr>

    @if ($teste === '123')
        É sim
    @elseif($teste == 123)
        É 123    
    @else
        É não
    @endif

    @unless ($teste === '123')
        se for falso
    @else
        se fo verdadeiro
    @endunless

    @isset($teste2)
        {{ $teste2 }}
    @endisset

    @empty($teste3)
        <p>vasio</p>
    @endempty

    @auth
        <p>Auth</p>
    @else
        <p>Não Auth</p>    
    @endauth

    @guest
        <p>Não Auth</p>
    @endguest

    @switch($teste)
        @case(1)
            iqual a 1
            @break
        @case(2)
            iqual a 2
            @break
        @default
            default
    @endswitch
@endsection


@push('styles')
    <style>
        .last{
            background: #CCC;
        }
    </style>    
@endpush

@push('scripts')
    <script>
        document.body.style.background = '#efefef'
    </script>
@endpush