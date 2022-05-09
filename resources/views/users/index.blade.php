@extends('layouts.app')

@section('title', 'Listagem dos usuários')

@section('content')
    <h1>
        Listagens de usuários
        <a href="{{ route('users.create') }}">(+)</a>
    </h1>

    <form action="{{ route('users.index') }}" method="get">
        <input type="text" name="search" placeholder="Pesquisar" value="{{ old('search') }}">
        <button>Pesquisar</button>
    </form>

    <ul>
        @foreach ($users as $user)
            <li>
                {{ $user->name }} -
                {{ $user->email }} -
                Anotações (0)
                | <a href="{{ route('users.edit', $user->id) }}">Editar</a>
                | <a href="{{ route('users.show', $user->id) }}">Detalhes</a>
                | <a href="{{ route('comments.index', $user->id) }}">Commentários</a>
            </li>
        @endforeach
    </ul>
@endsection
