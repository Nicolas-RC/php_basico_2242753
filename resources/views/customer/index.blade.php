@extends('templates.template')
@section('contenido')
    <header>
        <h1>Customers</h1>
    </header>
    <a class="btn btn-primary" href="{{ url('customer/create') }}"><i class="fas fa-plus"></i> New customer</a>
    <br/>
    <br/>
    @if (session("message"))
        <div class="alert alert-success">
            <div class="d-flex justify-content-center">
                <h3>{{session("message")}}</h3>
            </div>
        </div>
    @endif
    <table class="table table-hover">
        <thead>
            <tr>
                <th class="table-active">Name</th>
                <th>Country</th>
                <th>City</th>
                <th>Email</th>
                <th>Detail</th>
                <th>Update</th>
                <th>State</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $clientes as $cliente )
            @if ($cliente->Enable == 1 || $cliente->Enable == 2)
                <tr>
                    <td>{{ $cliente->FirstName }}  {{ $cliente->LastName }}</td>
                    <td>{{ $cliente->Country }}</td>
                    <td>{{ $cliente->City }}</td>
                    <td>{{ $cliente->Email }}</td>
                    <td><a href="{{ url('customer/'.$cliente->CustomerId) }}">More details</a></td>
                    <td><a href="{{ url('customer/'.$cliente->CustomerId.'/edit') }}">Update</a></td>
                    <td>
                        @switch ($cliente->Enable)
                            @case(1)
                                <strong style="color: #11B900">Active | </strong>
                                <a href="{{ url('customer/'.$cliente->CustomerId.'/enable') }}" title="Inactive">
                                    <img src="{{ asset('assets/prohibicion.png') }}" alt="Check" width="20" height="20">
                                </a>
                            @break
                            @case(2)
                                <strong style="color: red">Inactive | </strong>
                                <a href="{{ url('customer/'.$cliente->CustomerId.'/enable') }}" title="Active">
                                    <img src="{{ asset('assets/comprobado.png') }}" alt="Check" width="20" height="20">
                                </a>
                            @break
                        @endswitch
                    </td>
                </tr>
            @endif
            @endforeach
        </tbody>
    </table>
    {{ $clientes->links() }}
@endsection
