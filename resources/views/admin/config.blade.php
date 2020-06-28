@extends('layouts.admin')

@section('title', 'Configurações')

@section('content')

    <h1>Configurações</h1>


    <x-alert>
        Conteudo qualquer
    </x-alert>

    Lista do Bolo:
    <ul>
        @forelse($lista as $item)
        <li>{{$item}}</li>
        @empty
            <li>Não há itens</li>
        @endforelse

    </ul>

    @if($idade > 18 && $idade <= 60)
        Eu sou adulto.
    @elseif($idade > 60 && $idade <=100)
        Eu sou um idoso
    @else
        Eu não sou maior de idade.
    @endif

    @isset($versao)
        Existe uma versao e é a {{$versao}}
    @endisset

    @empty($cidade)
        Nao existe uma cidade
    @endempty

    <form method="post">
        @csrf

        Nome:<br>
        <input type="text" name="nome"><br>
        Idade:<br>
        <input type="text" name="idade"><br>
        <input type="submit" value="Enviar">

    </form>

    <a href="/config/info">Informações</a>

@endsection
