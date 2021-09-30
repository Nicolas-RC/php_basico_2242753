@extends('templates.template')
@section('contenido')
    <header>
        <h3>Name: {{ $empleado->FirstName }}  {{ $empleado->LastName }}</h3>
    </header>
    <ul>
        <li>Title: {{ $empleado->Title }}</li>
        <li>Country: {{ $empleado->Country }}</li>
        <li>City: {{ $empleado->City }}</li>
        <li>Phone number: {{ $empleado->Phone }}</li>
        <li>Email: {{ $empleado->Email }}</li>
        <li>Address: {{ $empleado->Address }}</li>

    </ul>
    <br/>
    <a href="{{ url('../employee') }}">Back</a>
@endsection
