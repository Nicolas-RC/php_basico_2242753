@extends('templates.template')
@section('contenido')
    <header>
        <h1>Employees</h1>
    </header>
    <a class="btn btn-primary" href="{{ url('employee/create') }}"><i class="fas fa-plus"></i> New employee</a>
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
                <th>Title</th>
                <th>City</th>
                <th>Email</th>
                <th>Detail</th>
                <th>Update</th>
                <th>State</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $empleados as $empleado )
            @if ($empleado->Enable == 1 || $empleado->Enable == 2)
                <tr>
                    <td>{{ $empleado->FirstName }}  {{ $empleado->LastName }}</td>
                    <td>{{ $empleado->Title }}</td>
                    <td>{{ $empleado->City }}</td>
                    <td>{{ $empleado->Email }}</td>
                    <td><a href="{{ 'employee/'.$empleado->EmployeeId }}">More details</a></td>
                    <td><a href="{{ url('employee/'.$empleado->EmployeeId.'/edit') }}">Update</a></td>
                    <td>
                        @switch ($empleado->Enable)
                            @case(1)
                                <strong style="color: #11B900">Active | </strong>
                                <a href="{{ url('employee/'.$empleado->EmployeeId.'/enable') }}" title="Inactive">
                                    <img src="{{ asset('assets/prohibicion.png') }}" alt="Check" width="20" height="20">
                                </a>
                            @break
                            @case(2)
                                <strong style="color: red">Inactive | </strong>
                                <a href="{{ url('employee/'.$empleado->EmployeeId.'/enable') }}" title="Active">
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
    {{ $empleados->links() }}
@endsection
