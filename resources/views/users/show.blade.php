@extends('templates.template')
@section('contenido')
    <header>
        <h3> {{ $user->name }} </h3>
    </header>
    <ul>
        <li>Email: {{ $user->email }}</li>
    </ul>
    <br/>
    <a href="{{ url('../users') }}">Back</a>
@endsection
