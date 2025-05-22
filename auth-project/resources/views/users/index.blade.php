<!-- resources/views/users/index.blade.php -->
@extends('layouts.app')

@section('header')
    <h2>Список пользователей</h2>
@endsection

@section('content')
    <ul>
        @foreach ($users as $user)
            <li>{{ $user->name }} — {{ $user->email }}</li>
        @endforeach
    </ul>
@endsection
