@extends('layouts.app')

@section('title', "Comentários do Usuário {$user->name}")

@section('content')
    <h1>
        Comentários do Usuário {{ $user->name }}
        <a href="{{ route('comments.create', $user->id) }}">(+)</a>
    </h1>

    <form action="{{ route('comments.index', $user->id) }}" method="get">
        <input type="text" name="search" placeholder="Pesquisar" value="{{ old('search') }}">
        <button>Pesquisar</button>
    </form>

    <ul>
        @foreach ($comments as $comment)
            <li>
                {{ $comment->body }} -
                {{ $comment->visible ? 'SIM' : 'NÃO' }}
                | <a href="{{ route('comments.edit', ['user' => $user->id, 'id' => $comment->id]) }}">Editar</a>
            </li>
        @endforeach
    </ul>
@endsection
