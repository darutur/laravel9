@extends('layouts.app')

@section('title', 'Visualização do usuário')

@section('content')
    <h1>Listagem do Usuário {{ $user->name }}</h1>

    <ul>
        <li>{{ $user->name }}</li>
        <li>{{ $user->email }}</li>
    </ul>
@endsection
