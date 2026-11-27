@extends('layouts.app')

@section('titulo', 'Cardápio da Feira')

@section('conteudo')
    <h1>Cardápio da Feira</h1>

    <p>Quantidade de pratos: {{ count($pratos) }}</p>

    <ul>
        @forelse ($pratos as $prato)
            <li>
                {{ $prato['nome'] }} -
                R$ {{ number_format($prato['preco'], 2, ',', '.') }}
            </li>
        @empty
            <li>Cardápio do dia ainda não definido.</li>
        @endforelse
    </ul>
@endsection
