@extends('templates.template')
@section('contenido')
    <header>
        <h3>Name: {{ $cliente->FirstName }}  {{ $cliente->LastName }}</h3>
    </header>
    <ul>
        <li>Country: {{ $cliente->Country }}</li>
        <li>City: {{ $cliente->City }}</li>
        <li>Email: {{ $cliente->Email }}</li>
        <li>Address: {{ $cliente->Address }}</li>
        <li>Phone number: {{ $cliente->Phone }}</li>
        @if ($cliente->Company==null)
            <li>Company: without a company</li>
        @else
            <li>Company: {{ $cliente->Company }}</li>
        @endif

    </ul>
    <br/>
    <a href="{{ url('../customer') }}">Back</a>
@endsection
