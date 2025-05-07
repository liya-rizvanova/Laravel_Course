@extends('layouts.default')

@section('content')
    <h2>Обновление данных работника</h2>
    <ul>
        <li><strong>ID:</strong> {{ $id }}</li>
        <li><strong>Name:</strong> {{ $name }}</li>
        <li><strong>Email:</strong> {{ $email }}</li>
        <li><strong>Surname:</strong> {{ $surname }}</li>
        <li><strong>Position:</strong> {{ $position }}</li>
        <li><strong>Address:</strong> {{ $address }}</li>
        <li><strong>Work Data:</strong> {{ $workData }}</li>
    </ul>

    <h3>Данные из JSON:</h3>
    <ul>
        <li><strong>Street:</strong> {{ $street }}</li>
        <li><strong>City:</strong> {{ $city }}</li>
        <li><strong>Lat:</strong> {{ $lat }}</li>
        <li><strong>Lng:</strong> {{ $lng }}</li>
    </ul>

    <h3>Информация о запросе:</h3>
    <ul>
        <li><strong>Path:</strong> {{ $path }}</li>
        <li><strong>URL:</strong> {{ $url }}</li>
    </ul>
@endsection
